<?php

namespace App\Providers;

use App\Link;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Observers\LinkObserver;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //监听事件
//        'App\Events\LinkEvent' => [
//            'App\Listeners\LinkEventListener',
//        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Link::observe(new LinkObserver);
    }
}
