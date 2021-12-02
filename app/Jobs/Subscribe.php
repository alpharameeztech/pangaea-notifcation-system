<?php

namespace App\Jobs;

use App\Interfaces\SubscriberRepositoryInterface;
use App\Models\Subscriber;
use App\Models\Topic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Subscribe implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $topic;
    protected $url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        Topic $topic,
        $url
    ) {
        $this->topic = $topic;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SubscriberRepositoryInterface $subscriberRepository)
    {

        /*
        * First find the Subscriber based on the url.
        * If no subscribr with the prvodied url(in request) exist
        * then create a new subscriber and attach to the topic subscription
        * otherwise get that subscriber and attach it with the topic subscription
        */
        try {
            $subscriber = $subscriberRepository->findByUrl($this->url);

            if (!$subscriber instanceof Subscriber) {
                $subscriber = $subscriberRepository->store($this->url);
            }

            $this->topic->subscribers()->syncWithoutDetaching($subscriber);
        } catch (\Throwable $th) {
            \Log::info('Something went wrong. Check logs for details. ' . $th);
        }

        return null;
    }
}
