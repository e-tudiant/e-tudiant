<?php

namespace App\Events;

use App\Events\AbstractEvent;
use Illuminate\Broadcasting\Channel;

class ClassroomMessageEvent extends AbstractEvent
{
  private $classroomId;

  public $message;

  /**
   * Create a new event instance.
   *
   * @return void
   */
   public function __construct($classroomId, $message)
   {
     $this->classroomId = $classroomId;
     $this->message = $message;

     $this->dontBroadcastToCurrentUser();
   }

  /**
   * Get the channels the event should be broadcast on.
   *
   * @return array
   */
  public function broadcastOn()
  {
    return new Channel('Classroom.'.$this->classroomId);
  }

  /**
   * Define the event's broadcast name
   *
   * @return string
   */
  public function broadcastAs()
  {
    return 'new.message';
  }
}
