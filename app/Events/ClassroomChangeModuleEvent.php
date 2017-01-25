<?php

namespace App\Events;

use App\Events\AbstractEvent;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Support\Facades\Auth;

class ClassroomChangeModuleEvent extends AbstractEvent
{
  private $classroomId;
  private $event;

  public $moduleName;
  public $moduleUrl;

  /**
   * Create a new event instance.
   *
   * @return void
   */
   public function __construct($classroomId, $module, $event)
   {
     $this->classroomId = $classroomId;
     $this->event = $event;
     $this->moduleName = $module->name;
     $this->moduleUrl = $module->slider_url;
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
    return $this->event.'.module';
  }
}
