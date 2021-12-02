<?php

namespace App\Repositories;

use App\Interfaces\MessageRepositoryInterface;
use App\Models\Message;
use App\Models\Topic;

class MessageRepository implements MessageRepositoryInterface 
{
    
    public function store(Topic $topic, $message) 
    {
        try {
            return $topic->messages()->create([
                'content' =>  $message
            ]);
        } catch (\Throwable $th) {
            \Log::debug($th);
            return null;
        }
    }

    public function all(){
        return Message::get();
    }
    
}