<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class Message extends Notification
{
    use Queueable;

    public $emailSender, $fullname, $message, $country, $city;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($emailSender, $fullname, $message, $country, $city)
    {
        $this->emailSender = $emailSender;
        $this->fullname = $fullname;
        $this->message = $message;
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
        $timestamp = date('H:i d-m-Y');
        return (new MailMessage)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject(trans('messages.newMessage'))
            ->line(trans('messages.newMessageTitle'))
            ->line(new HtmlString('<b>'.trans('messages.email').'</b>: '.$this->emailSender))
            ->line(new HtmlString('<b>'.trans('messages.sender').'</b>: '.$this->fullname))
            ->line(new HtmlString('<b>'.trans('messages.state').'</b>: '.$this->country))
            ->line(new HtmlString('<b>'.trans('messages.city').'</b>: '.$this->city))
            ->line(new HtmlString('<b>'.trans('messages.time').'</b>: '.$timestamp))
            ->line(new HtmlString('<br><br><b>'.trans('messages.msg').'</b>: '))
            ->line($this->message);
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
