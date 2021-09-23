<?php

namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TaskAssigned extends Notification
{
    use Queueable;

    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function via($nofifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'task_assigend',
            'title' => $this->task->title
        ];
    }

}