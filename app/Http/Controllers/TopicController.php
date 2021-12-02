<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\SubscriberRequest;
use App\Http\Requests\TopicRequest;
use App\Http\Resources\TopicResource;
use App\Interfaces\MessageRepositoryInterface;
use App\Interfaces\TopicRepositoryInterface;
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


    public function subscribe(Topic $topic, SubscriberRequest $request)
    {

        $data = [
            'url' => $request->url,
            'topic' => $topic->name,
            'topic_slug' => $topic->slug
        ];

        return $this->setStatusCode(200)->respondCreated($data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
