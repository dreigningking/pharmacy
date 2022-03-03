<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use App\NotificationSetting;

class UserChangesNotification extends Notification implements ShouldQueue 
{
    use Queueable;
    public $element;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($element)
    {
        $this->element = $element;
    }

    /**;z
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $setting = NotificationSetting::where('name','user_changes')->first();
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
                    ->subject(ucwords($this->element).' Change.')
                    ->line('Your '.$this->element.' was changed on '.$notifiable->updated_at->format('D d,M').'If you are unaware about this changes, please contact support immediately')
                    ->line('You may ignore this image if you believe all is well!');
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
            'message'=> 'Your '.$this->element.' was changed on '.$notifiable->updated_at->format('D d,M')
        ];
    }
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)->content('Your '.$this->element.' was changed');
    }
}
