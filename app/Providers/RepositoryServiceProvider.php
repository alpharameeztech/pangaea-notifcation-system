<?php

namespace App\Providers;

use App\Interfaces\MessageRepositoryInterface;
use App\Interfaces\SubscriberRepositoryInterface;
use App\Interfaces\TopicRepositoryInterface;
use App\Repositories\MessageRepository;
use App\Repositories\SubscriberRepository;
use App\Repositories\TopicRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TopicRepositoryInterface::class, TopicRepository::class);
        $this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);
        $this->app->bind(SubscriberRepositoryInterface::class, SubscriberRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
