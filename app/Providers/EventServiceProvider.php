<?php

namespace App\Providers;

use App\Events\ProductCreated;
use App\Listeners\SendProductCreatedEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProductCreated::class => [
            SendProductCreatedEmail::class,
        ],
        \App\Events\ProductCreated::class => [
            \App\Listeners\LogProductActivity::class,
        ],
        \App\Events\ProductUpdated::class => [
            \App\Listeners\LogProductActivity::class,
        ],
        \App\Events\ProductDeleted::class => [
            \App\Listeners\LogProductActivity::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
