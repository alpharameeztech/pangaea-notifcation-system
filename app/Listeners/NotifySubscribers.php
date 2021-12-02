<?php

namespace App\Listeners;

use App\Events\MessagePublished;
use App\Notifications\NotifySubscribers as NotificationsNotifySubscribers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifySubscribers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MessagePublished  $event
     * @return void
     */
    public function handle(MessagePublished $event)
    {
        $topic = $event->message->topic;

        $subscribers = $topic->subscribers;

        //broadcast notification to the topic subscribers
        Notification::sendNow($subscribers, new NotificationsNotifySubscribers($event->message));

    }
}
