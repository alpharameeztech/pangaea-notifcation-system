<?php

namespace App\Http\Controllers;

use App\Interfaces\MessageRepositoryInterface;
use App\Interfaces\SubscriberRepositoryInterface;
use App\Interfaces\TopicRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $topicRepository;
    protected $messageRepository;
    protected $subscriberRepository;

    function __construct(
        TopicRepositoryInterface $topicRepository,
        MessageRepositoryInterface $messageRepository,
        SubscriberRepositoryInterface $subscriberRepository
        )
    {
        $this->topicRepository = $topicRepository;
        $this->messageRepository = $messageRepository;
        $this->subscriberRepository = $subscriberRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard', [
            'topics' => $this->topicRepository->all(),
            'messages' => $this->messageRepository->all(),
            'subscribers' => $this->subscriberRepository->all()
        ]);
    }

}
