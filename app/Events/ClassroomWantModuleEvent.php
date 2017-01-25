<?php

namespace App\Events;

use App\Events\AbstractEvent;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Support\Facades\Auth;

class ClassroomWantModuleEvent extends AbstractEvent
{
  private $classroomId;

  /**
   * Create a new event instance.
   *
   * @return void
   */
   public function __construct($classroomId)
   {
     $this->classroomId = $classroomId;
   }

  /**
   * Get the channels the event should be broadcast on.
   *
   * @return array
   */
  public function broadcastOn()
  {
    return new PrivateChannel('Classroom.'.$this->classroomId);
  }

  /**
   * Define the event's broadcast name
   *
   * @return string
   */
  public function broadcastAs()
  {
    return 'want.module';
  }
}
