<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessageNotification extends Notification
{
    use Queueable;

    protected $message;
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Nouveau message reçu')
                    ->greeting('Bonjour ' . $notifiable->name . ',')
                    ->line('Vous avez reçu un nouveau message de ' . $this->message->sender->name . '.')
                    ->action('Voir le message', url('/messages/' . $this->message->conversation_id))
                    ->line('Merci d\'utiliser notre plateforme!');
            }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
