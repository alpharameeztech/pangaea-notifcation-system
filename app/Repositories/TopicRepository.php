<?php

namespace App\Repositories;

use App\Interfaces\TopicRepositoryInterface;
use App\Models\Topic;
use Illuminate\Support\Str;

class TopicRepository implements TopicRepositoryInterface 
{
    
    public function store($name) 
    {
        try {
            $topic = new Topic;
            $topic->name = $name;
            $topic->slug = $this->generateSlug();
            $topic->save();
        } catch (\Throwable $th) {
            \Log::debug($th);
            return null;
        }
        return $topic;
    }

    public function generateSlug($length=5)
    {
        return Str::random($length);
    }

    public function all(){
        return Topic::get();
    }
}