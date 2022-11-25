<?php

namespace App\Notifications;

use App\Models\Pharmacy;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvitationNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $pharmacy;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pharmacy $pharmacy)
    {
        $this->pharmacy = $pharmacy;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // $setting = NotificationSetting::where('name','penalty_charges')->first();
        // $destination = [];
        // if($setting->sms && $notifiable->sms_notify && $notifiable->mobile) $destination[] = 'nexmo';
        // if($setting->email && $notifiable->email_notify)  $destination[] = 'mail';
        // if($setting->app) $destination[] = 'database';
        // $destination[] = 'broadcast';
        // return $destination;
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
                    ->subject($this->pharmacy->name.' Invitation.')
                    ->greeting('Dear '.$notifiable->name)
                    ->line('Here is an invitation to join us to work at '.$this->pharmacy->name.' as a '.$notifiable->role->name.'.')
                    ->line('Click the button below to Accept Invitation')
                    ->action('Accept Invitation', route('invitations',[$this->pharmacy,$notifiable]));
    }

    public function toArray($notifiable)
    {
        return [
            
        ];
    }
    
}
