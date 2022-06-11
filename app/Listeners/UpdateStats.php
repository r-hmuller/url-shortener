<?php

namespace App\Listeners;

use App\Events\UrlAccessed;
use App\Models\Click;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStats implements ShouldQueue
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
     * @param  \App\Events\UrlAccessed  $event
     * @return void
     */
    public function handle(UrlAccessed $event)
    {
        $click = new Click();
        $click->url()->associate($event->url);
        $click->save();
    }
}
