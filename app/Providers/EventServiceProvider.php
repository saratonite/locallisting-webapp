<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\CategoryEdited' =>[
            'App\Listeners\CategoryListerner'
        ],
        ///////////////Real //////
        'App\Events\NewUserRegistered' => [
            'App\Listeners\Email@newUser'
        ],
        'App\Events\NewVendorRegistered' => [
            'App\Listeners\Email@newVendor'
        ],
        'App\Events\VendorStatusChanged' => [
            'App\Listeners\Email@vendorStatusChanged'
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
