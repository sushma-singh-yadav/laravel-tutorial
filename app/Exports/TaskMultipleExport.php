<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TaskMultipleExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  sheets(): array
    {
        return [
            'Task' => new TaskExport(),
            'Task Comments' => new TaskCommentExport()
        ];
    }
}
