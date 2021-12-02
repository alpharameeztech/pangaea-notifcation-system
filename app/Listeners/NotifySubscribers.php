<?php

namespace App\Listeners;

use App\Events\MessagePublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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

    }
}
