<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class NewRegistration extends Notification
{
    use Queueable;

    public $email;
    public $country;
    public $city;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $country, $city)
    {
        $this->email = $email;
        $this->country = $country;
        $this->city = $city;
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
            ->from(env('MAIL_NO_REPLY'))
            ->subject(trans('notifications.newUserAdmin'))
            ->line(trans('notifications.newUserTitleAdmin'))
            ->line(new HtmlString('<b>'.trans('messages.email').'</b>: '.$this->email))
            ->line(new HtmlString('<b>'.trans('messages.state').'</b>: '.$this->country))
            ->line(new HtmlString('<b>'.trans('messages.city').'</b>: '.$this->city));
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
