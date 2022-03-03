<?php

namespace App\Notifications;

use App\Ticket;
use App\NotificationSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class SupportTicketClosedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $ticket;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $setting = NotificationSetting::where('name','ticket_closed')->first();
        $destination = [];
        if($setting->sms && $notifiable->sms_notify && $notifiable->mobile) $destination[] = 'nexmo';
        if($setting->email && $notifiable->email_notify)  $destination[] = 'mail';
        if($setting->app) $destination[] = 'database';
        $destination[] = 'broadcast';
        return $destination;
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
                    ->line('Your support ticket with subject: '.$this->ticket->subject.' is now closed.')
                    ->line('If you wish to reopen this ticket, you may visit the support page and click the reopen button to reopen it.')
                    ->line('Thank you for using our application!');
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
            'message' => 'Support ticket with title: '.$this->ticket->subject.' has been closed.'
        ];
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)->content('Support ticket with title: '.$this->ticket->subject.' has been closed');
    }
}
