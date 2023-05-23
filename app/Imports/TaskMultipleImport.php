<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TaskMultipleImport implements WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    public function sheets(): array
    {
        return [
            'Task' => new TaskImport(),
            'Task Comments' => new TaskCommentImport(),
        ];
    }
}
