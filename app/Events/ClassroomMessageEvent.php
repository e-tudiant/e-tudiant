<?php

namespace App\Events;

use App\Events\AbstractEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Auth;

class ClassroomMessageEvent extends AbstractEvent
{
  private $classroomId;

  public $message;
  public $username;

  /**
   * Create a new event instance.
   *
   * @return void
   */
   public function __construct($classroomId, $message)
   {
     $this->classroomId = $classroomId;
     $this->message = $message;
     $this->username = Auth::user()->firstname;
   }

  /**
   * Get the channels the event should be broadcast on.
   *
   * @return array
   */
  public function broadcastOn()
  {
    return new Channel('private-Classroom.'.$this->classroomId);
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
