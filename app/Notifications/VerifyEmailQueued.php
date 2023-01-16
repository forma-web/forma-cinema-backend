<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class VerifyEmailQueued extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Get the notification's channels.
     *
     * @return array|string
     */
    public function via(): array|string
    {
        return ['mail'];
    }

    /**
     * @param \App\Models\User $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(User $notifiable): MailMessage
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return $this->buildMailMessage($notifiable, $verificationUrl);
    }

    /**
     * @param \App\Models\User $notifiable
     * @param string $url
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function buildMailMessage(User $notifiable, string $url): MailMessage
    {
        return (new MailMessage)
            ->subject('Добро пожаловать в систему')
            ->view('mails.user_created', [
                'url' => $url,
                'username' => $notifiable->first_name,
            ]);
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl(User $notifiable): string
    {
        $expires = now()->addMinutes(config('auth.verification.expire', 60));

        $routeName = 'auth.email.verify';

        $payload = [
            'id' => $notifiable->getKey(),
            'hash' => sha1($notifiable->getEmailForVerification()),
        ];

        $params = http_build_query([
            'verifier' => URL::temporarySignedRoute($routeName, $expires, $payload),
        ]);

        return config('app.frontend_url') . '?' . $params;
    }
}
