<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DatabaseNotification extends Notification
{
    use Queueable;

    /**
     * @var array $data
     */
    public $data;

    /**
     * @var Model|null
     */
    public $model;

    /**
     * @var string|null
     */
    public $referenceCode;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $data, ?Model $model = null, ?string $referenceCode = null)
    {
        $this->data = $data;
        $this->model = $model;
        $this->referenceCode = $referenceCode;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return $this->data;
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
