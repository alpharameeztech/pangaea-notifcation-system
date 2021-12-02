<?php

namespace App\Interfaces;

use App\Models\Topic;

interface MessageRepositoryInterface 
{
    public function store(Topic $topic, $message);
    public function all();

}