<?php

namespace App\Repositories;

use App\Interfaces\SubscriberRepositoryInterface;
use App\Models\Subscriber;
use App\Models\Topic;
use Illuminate\Support\Str;

class SubscriberRepository implements SubscriberRepositoryInterface 
{
    
    public function findByUrl($url)
    {
        return Subscriber::where('url', $url)->first();
    }

    public function store($url){
        $subscriber = new Subscriber;
        $subscriber->url = $url;
        $subscriber->save();
        return $subscriber;
    }
    public function all(){
        return Subscriber::get();
    }
}