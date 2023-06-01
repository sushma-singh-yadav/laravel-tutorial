<?php

namespace App\Http\Controllers;

use App\Exports\TaskMultipleExport;
use App\Models\Task;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{
    //
    public function index(){
        $task = Task::get();
       return view('task',['task' => $task]);
    }

    public function exportFile()
    {
        return Excel::download(new TaskMultipleExport(), 'task.xlsx');
    }
}
