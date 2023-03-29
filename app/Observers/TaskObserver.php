<?php

namespace App\Observers;

use App\Models\Task;
use App\Models\TaskActivity;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class TaskObserver
{
    public function creating(Task $task)
    {
        //
        Log::info('Task creating', ['task' => $task]);
        $task->title = 'Task-'.$task->title;
        Log::info('After Task creating', ['task' => $task]);
    }

    /**
     * Handle the Task "created" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function created(Task $task)
    {
        //

        Log::info('Before Task created', ['task' => $task]);
        $task->task_slug = Str::slug($task->title);
        $task->save();
        Log::info('After Task created', ['task' => $task]);
    }
    public function updating(Task $task)
    {
        //
        TaskActivity::create(['task_id'=>$task->id,'activity'=>'updating']);
    }

    /**
     * Handle the Task "updated" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        //
        TaskActivity::create(['task_id'=>$task->id,'activity'=>'updated']);
    }

    /**
     * Handle the Task "deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function restored(Task $task)
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function forceDeleted(Task $task)
    {
        //
    }
}
