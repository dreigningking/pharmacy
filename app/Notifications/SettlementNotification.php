<?php

namespace App\Notifications;

use App\Settlement;
use App\NotificationSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class SettlementNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $settlement;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Settlement $settlement)
    {
        $this->settlement = $settlement;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $setting = NotificationSetting::where('name','settlement')->first();
        $destination = [];
        if($setting->sms && $notifiable->sms_notify && $notifiable->mobile) $destination[] = 'nexmo';
        if($setting->email && $notifiable->email_notify)  $destination[] = 'mail';
        if($setting->app) $destination[] = 'database';
        $destination[] = 'broadcast';
        return $destination;
    }

    public function word($type){
        switch($type){
            case 'App\Escrow':
                $word = 'You have received the sum of '.$this->settlement->currency->symbol.' '.$this->settlement->amount.' for escrow with id #'.$this->settlement->settlementable_id;
            break;
            case 'App\Invoice':
                $word = 'You have received the sum of '.$this->settlement->currency->symbol.' '.$this->settlement->amount.' for invoice with id #'.$this->settlement->settlementable_id;    
            break;
            case 'App\DisputeFee':
                $word = 'Your dispute fee of '.$this->settlement->currency->symbol.' '.$this->settlement->amount.' has been refunded into your wallet';
            break;
            case 'App\Wallet':
                $word = 'The sum of '.$this->settlement->currency->symbol.' '.$this->settlement->amount.' has been deposited into your wallet.';
            break;
            case 'App\Payment':
                $word = 'The sum of '.$this->settlement->currency->symbol.' '.$this->settlement->amount.' has been refunded into your wallet';
            break;
        }
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Wallet Payment')
                    ->line($this->word($this->settlement->settlementable_type))
                    ->action('View Wallet', route('wallet'))
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
            'message' => $this->word($this->settlement->settlementable_type)
        ];
    }
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)->content($this->word($this->settlement->settlementable_type));
    }
}
