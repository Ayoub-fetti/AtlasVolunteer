<?php

namespace App\Notifications;

use App\Models\Opportunity;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOpportunityNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $opportunity;

    public function __construct(Opportunity $opportunity)
    {
        $this->opportunity = $opportunity;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nouvelle opportunité de bénévolat: ' . $this->opportunity->title)
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Une nouvelle opportunité de bénévolat vient d\'être publiée qui pourrait vous intéresser.')
            ->line('Titre: ' . $this->opportunity->title)
            ->line('Description: ' . substr($this->opportunity->description, 0, 100) . '...')
            ->line('Lieu: ' . $this->opportunity->country . ($this->opportunity->state ? ', ' . $this->opportunity->state : ''))
            ->line('Date de début: ' . $this->opportunity->start_date)
            ->action('Voir les détails', url('/opportunities/' . $this->opportunity->id))
            ->line('Merci d\'utiliser notre plateforme!');
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
