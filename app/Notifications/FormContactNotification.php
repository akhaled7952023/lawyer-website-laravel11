<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FormContactNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $formData;
    public $header;
    public $message;
    public function __construct($formData)
    {
        $this->formData = $formData;
        $this->header = "New Message From Customer";
        $this->message = "تم استلام رسالة جديدة من الموقع بالبيانات التالية:";
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject($this->header)
        ->line($this->message)
        ->line($this->formData['name'])
        ->line($this->formData['city'])
        ->line($this->formData['phone'])
        ->line($this->formData['email'])
        ->line(($this->formData['message'] ?? ''))
        ->line('شكراً لتعاونكم!')
        ->line('')
        ->salutation('');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
