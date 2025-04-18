<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomVerifyEmail extends VerifyEmailNotification
{
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Verify Email Address - ' . config('app.name'))
            ->greeting('Hello!')
            ->line('Thank you for registering with ' . config('app.name') . '.')
            ->line('Please click the button below to verify your email address.')
            ->action('Verify Email Address', $url)
            ->line('If you did not create an account, no further action is required.');
    }
}