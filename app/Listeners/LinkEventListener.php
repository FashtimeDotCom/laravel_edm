<?php

namespace App\Listeners;

use App\Events\LinkEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LinkEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LinkEvent  $event
     * @return void
     */
    public function handle(LinkEvent $event)
    {
//        dd($event->link->getAttribute("redirect_url"));die;
    }
}
