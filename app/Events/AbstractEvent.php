<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;

abstract class AbstractEvent implements ShouldBroadcast {
    use InteractsWithSockets, SerializesModels;
}
