<?php

namespace App\Imports;

use App\Models\Task;
use App\Models\TaskComments;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskCommentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $task = Task::where('title', $row['task'])->first();
        return new TaskComments([
            //
            'task_id' => $task->id,
            'coments' => $row['comment'],
        ]);
    }
}
