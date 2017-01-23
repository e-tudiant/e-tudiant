<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

abstract class AbstractEvent implements ShouldBroadcast {
    use SerializesModels;
}
