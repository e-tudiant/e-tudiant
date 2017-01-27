<?php

namespace App\Events;

use App\Events\AbstractEvent;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Support\Facades\Auth;

use App\Session;
use App\Quizz;

class ClassroomQuizzResultEvent extends AbstractEvent
{
  private $classroomId;
  private $quizzId;

  public $userId;
  public $nbQuestions;
  public $nbCorrect;
  public $successPercent;
  public $quizzName;

  /**
   * Create a new event instance.
   *
   * @return void
   */
   public function __construct($classroomId, $quizzId, $userId)
   {
     $this->classroomId = $classroomId;
     $this->quizzId = $quizzId;
     $this->userId = $userId;

     $quizzResult = Session::quizzResult($this->quizzId, $this->classroomId, $this->userId);
     $this->nbQuestions = $quizzResult["nb_questions"];
     $this->nbCorrect = $quizzResult["nb_correct"];
     $quizz = Quizz::findOrFail($this->quizzId);
     $this->quizzName = $quizz->name;
     $this->successPercent = $quizzResult["success_percent"];
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
    return 'result.quizz';
  }
}