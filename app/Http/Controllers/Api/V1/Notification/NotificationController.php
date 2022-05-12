<?php

namespace App\Http\Controllers\Api\V1\Notification;

use App\Http\Controllers\ApiController;
use App\Models\Book;
use App\Models\User;
use App\Notifications\DatabaseNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Notification;

class NotificationController extends ApiController
{
    public function send(): JsonResponse
    {
        $user = User::first();
        $book = Book::first();

        $data = [
            'greeting' => 'Hi '.$user->name.',',
            'body' => 'This is the project assigned to you.',
            'thanks' => 'Thank you this is from codeanddeploy.com',
            'actionText' => 'View Project',
            'actionURL' => url('/'),
            'id' => 57
        ];

        Notification::send($user, new DatabaseNotification($data, $book, 'book-register'));

        return $this->showMessage('Notification sent');
    }
}
