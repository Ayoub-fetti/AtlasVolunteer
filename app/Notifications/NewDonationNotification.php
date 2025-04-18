<?php

namespace App\Notifications;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDonationNotification extends Notification
{
    use Queueable;

    protected $donation;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nouvelle donation: ' . $this->donation->title)
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Une nouvelle donation vient d\'être publiée qui pourrait vous intéresser.')
            ->line('Titre: ' . $this->donation->title)
            ->line('Description: ' . substr($this->donation->description, 0, 100) . '...')
            ->action('Voir les détails', url('/donations/' . $this->donation->id))
            ->line('Merci d\'utiliser notre plateforme!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
