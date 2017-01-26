<?php

namespace App\Events;

use App\Events\AbstractEvent;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Support\Facades\Auth;

class ClassroomQuizzEvent extends AbstractEvent
{
  private $classroomId;
  private $action;

  public $quizzId;

  /**
   * Create a new event instance.
   *
   * @return void
   */
   public function __construct($classroomId, $quizzId, $action)
   {
     $this->classroomId = $classroomId;
     $this->action = $action;
     $this->quizzId = $quizzId;
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
    return $this->action.'.quizz';
  }
}