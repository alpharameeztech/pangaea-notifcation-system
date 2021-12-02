<?php

namespace App\Interfaces;

interface TopicRepositoryInterface 
{
    public function store($topic);
    public function generateSlug($length=5);
    public function all();
}