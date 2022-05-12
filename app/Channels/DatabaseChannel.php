<?php

namespace App\Channels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Channels\DatabaseChannel as IlluminateDatabaseChannel;
use Illuminate\Notifications\Notification;

class DatabaseChannel extends IlluminateDatabaseChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function send($notifiable, Notification $notification)
    {
        // $notifiable -> User

        // dd($notification);

        return $notifiable->routeNotificationFor('database', $notification)->create(
            [
                'id' => $notification->id,
                'type' => method_exists($notification, 'databaseType')
                    ? $notification->databaseType($notifiable)
                    : get_class($notification),
                'data' => $this->getData($notifiable, $notification),
                'read_at' => null,
                'reference_code' => $notification->referenceCode ?: null,
                'resourceable_type' => $notification->model ? get_class($notification->model) : null,
                'resourceable_id' => $notification->model ? $notification->model->getKey() : null,
            ]
        );
    }


//    protected function buildPayload($notifiable, Notification $notification)
//    {
//        dd($notifiable, $notification);
//
//        // $notifiable -> User
//
//        return [
//            'id' => $notification->id,
//            'type' => method_exists($notification, 'databaseType')
//                ? $notification->databaseType($notifiable)
//                : get_class($notification),
//            'data' => $this->getData($notifiable, $notification),
//            'read_at' => null,
//        ];
//    }
}
