<?php

namespace App\Events;

use App\Models\Url;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UrlAccessed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Url $url;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Url $url)
    {
        $this->url = $url;
    }
}
