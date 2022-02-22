<?php

namespace App\Notifications;

use App\LoginHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use App\NotificationSetting;

class SuspiciousLoginNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $loginHistory;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(LoginHistory $loginHistory)
    {
        $this->loginHistory = $loginHistory;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $setting = NotificationSetting::where('name','suspicious_login')->first();
        $destination = [];
        if($setting->sms && $notifiable->sms_notify && $notifiable->mobile) $destination[] = 'nexmo';
        if($setting->email && $notifiable->email_notify)  $destination[] = 'mail';
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
                    ->line('Someone just logged into your account from a different location or device .')
                    ->line('Device: '.$this->loginHistory->device)
                    ->line('Operating System: '.$this->loginHistory->platform)
                    ->line('Location: '.$this->loginHistory->location)
                    ->line('If that was you, then you have nothing to worry about. Please ignore this email and continue using PinVoice. If however that was not you, your account may have been compromised. Please reset your password now .')
                    ->action('Reset Password', route('password.request'));

    }
    
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)->content('Someone just logged into your account from a different location or device. If that was not you, login now to change your password');
    }
}
