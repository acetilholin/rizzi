<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class Inquiry extends Notification
{
    use Queueable;

    public $salutation, $fullname, $email, $adults, $kids, $board, $arrival, $departure;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($salutation, $fullname, $email, $adults, $kids, $board, $arrival, $departure)
    {
        $this->salutation = $salutation;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->adults = $adults;
        $this->kids = $kids;
        $this->board = $board;
        $this->arrival = $arrival;
        $this->departure = $departure;
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
            ->from($this->email)
            ->subject(trans('inquiry.newInquiry'))
            ->line(trans('inquiry.newInquiryTitle') .':')
            ->line(new HtmlString('<b>'.trans('inquiry.person').'</b>: '.$this->salutation.' '.$this->fullname))
            ->line(new HtmlString('<b>'.trans('inquiry.email').'</b>: '.$this->email))
            ->line(new HtmlString('<b>'.trans('inquiry.adults').'</b>: '.$this->adults))
            ->line(new HtmlString('<b>'.trans('inquiry.kids').'</b>: '.$this->kids))
            ->line(new HtmlString('<b>'.trans('inquiry.board').'</b>: '.$this->board))
            ->line(new HtmlString('<b>'.trans('inquiry.arrival').'</b>: '.$this->arrival))
            ->line(new HtmlString('<b>'.trans('inquiry.departure').'</b>: '.$this->departure));
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
