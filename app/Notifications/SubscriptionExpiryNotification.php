<?php

namespace App\Notifications;

use App\TicketMessage;
use App\NotificationSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class SupportResponseNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(TicketMessage $message)
    {
        $this->message = $message;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $setting = NotificationSetting::where('name','support_message')->first();
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
                    ->subject('PinVoice Support Reply.')
                    ->line('You have a new support message.')
                    ->action('View Message', route('supportdetails',$this->message->ticket));
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
            'message' => 'You have a new support message',
            'url'=> route('supportdetails',$this->message->ticket)
        ];
    }
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)->content('You have a new support reply');
    }
}
