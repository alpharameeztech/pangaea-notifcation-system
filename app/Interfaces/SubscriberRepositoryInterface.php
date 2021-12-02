<?php

namespace App\Interfaces;

interface SubscriberRepositoryInterface 
{
    public function findByUrl($url);
    public function store($url);
    public function all();

}