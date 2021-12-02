<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\SubscriberRequest;
use App\Http\Requests\TopicRequest;
use App\Http\Resources\TopicResource;
use App\Interfaces\MessageRepositoryInterface;
use App\Interfaces\TopicRepositoryInterface;
use App\Jobs\Subscribe;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends ApiController
{
    protected $topicRepository;
    protected $messageRepository;

    function __construct(
        TopicRepositoryInterface $topicRepository,
        MessageRepositoryInterface $messageRepository
    ) {
        $this->topicRepository = $topicRepository;
        $this->messageRepository = $messageRepository;
    }

    /**
     * Attach a new/existing subscription
     * with a topic
     */

    public function subscribe(Topic $topic, SubscriberRequest $request)
    {

        Subscribe::dispatch($topic, $request->url);

        $data = [
            'url' => $request->url,
            'topic' => $topic->name,
            'topic_slug' => $topic->slug
        ];

        return $this->setStatusCode(200)->respondCreated($data);
    }

    /**
     * Publish a message to the topic
     * 
     */
    public function publishMessage(Topic $topic, MessageRequest $request){

        $message = $this->messageRepository->store($topic, $request->message);

        $data = [
            'topic' => $topic->name,
            'topic_slug' => $topic->slug,
            'data' => $request->message
        ];

        return $this->setStatusCode(201)->respondCreated($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        $topic = $this->topicRepository->store($request->name);

        if ($topic instanceof Topic) {

            $formattedResource = new TopicResource($topic);

            return $this->setStatusCode(201)->respondCreated($formattedResource);
        } else {

            return $this->setStatusCode(502)->respondWithError('Something went wrong. Check logs for details');
        }
    }

  
}
