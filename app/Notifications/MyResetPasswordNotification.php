<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

class MyResetPasswordNotification extends ResetPassword
{
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Solicitação de Redefinição de Senha')
            ->line('Você está recebendo essa mensagem por solicitação de redefinição de senha foi realizada.')
            ->action('Resetar Senha', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('O link de reset de senha irá expirar em 60 minutos.', ['count' => config('auth.passwords.users.expire')])
            ->line('Se você não requisitou alterção de senha, não é obrigatório.');
    }

}
