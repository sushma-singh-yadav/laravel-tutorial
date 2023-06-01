<?php

namespace App\Exports;

use App\Models\TaskComments;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class TaskCommentExport implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TaskComments::select('task_id','coments')->get();
    }
    public function title(): string
    {
        return 'Task Comments';
    }
    public function headings(): array
    {
        return ['Task','Comment'];
    }
}
