<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationStatusUpdatedNotification extends Notification
{
    use Queueable;
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
            'rejected' => 'a été marquée comme terminée',
            'completed' => 'a été marquée comme terminée'
        ];
        $statusMessages = $statusMessages[$this->application->status] ?? 'a été mise à jour';

        return (new MailMessage)
                    ->subject('Mise à jour de votre candidature')
                    ->greeting('Bonjour ' . $notifiable->name . ',')
                    ->line('Votre candidature pour l\'opportunité "' . $this->application->opportunity->title . '" ' . $statusMessages . '.')
                    ->line($this->getAdditionalInfo())
                    ->action('Voir les détails', url('/opportunity/applications'))
                    ->line('Merci d\'utiliser notre platforme!');
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
