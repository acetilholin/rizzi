<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;

class ResetPassword extends Notification
{
    use Queueable;

    public $token;
    public $id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $id)
    {
        $this->token = $token;
        $this->id = $id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from(\env('MAIL_NO_REPLY'))
            ->subject('Nuova password')
            ->line('Inserisci un token, non sarà valido dopo 60 minuti.!')
            ->line(new HtmlString('<div class="text-center"><b>'.$this->token.'</b></div>'))
            ->action(Lang::get('Inserisci il token'), env('TOKEN_URL'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
