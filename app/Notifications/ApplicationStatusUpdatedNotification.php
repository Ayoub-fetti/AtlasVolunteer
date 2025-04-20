<?php

namespace App\Notifications;

use App\Models\Application;
use App\Services\CertificateGenerator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationStatusUpdatedNotification extends Notification
{
    protected $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $statusMessages = [
            'pending' => 'est en attente de traitement',
            'approved' => 'a été approuvée',
            'rejected' => 'a été rejetée',
            'completed' => 'a été marquée comme terminée'
        ];
        $statusMessage = $statusMessages[$this->application->status] ?? 'a été mise à jour';

        $mailMessage = (new MailMessage)
            ->subject('Mise à jour de votre candidature')
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Votre candidature pour l\'opportunité "' . $this->application->opportunity->title . '" ' . $statusMessage . '.')
            ->line($this->getAdditionalInfo())
            ->action('Voir les détails', url('/opportunity/applications'))
            ->line('Merci d\'utiliser notre platforme!');

        // Attach certificate PDF if application status is completed
        if ($this->application->status === 'completed') {
            $certificateGenerator = new CertificateGenerator();
            $pdfContent = $certificateGenerator->generateCertificate($this->application);
            
            $mailMessage->attachData(
                $pdfContent,
                'attestation_benevolat.pdf',
                [
                    'mime' => 'application/pdf',
                ]
            );
            $mailMessage->line('Vous trouverez ci-joint une attestation de bénévolat pour votre contribution.');
        }

        return $mailMessage;
    }

    public function getAdditionalInfo(){
        switch ($this->application->status){
            case 'approved':
                return 'Vous pouvez maintenant commencer votre bénévolat selon les dates convenues.';
            case 'rejected':
                return 'N\'hésitez pas à postuler à d\'autres opportunités qui correspondent à votre profil. ';
            case 'completed':
                return 'Vous avez servi ' . $this->application->hours_served . ' heures. Merci pour votre contribution!';
            default:
                return '';
        }
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
