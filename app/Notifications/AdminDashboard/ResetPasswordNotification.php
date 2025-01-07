<?php

namespace App\Notifications\AdminDashboard;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    protected $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }


    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Reset your password')
            ->view('admin-dashboard.emails.password-reset', [
                'url' => $this->url,
                'user' => $notifiable,
            ]);
    }


    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
