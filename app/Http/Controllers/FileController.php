<?php

namespace App\Http\Controllers;

use App\Imports\TaskImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{
    //
    public function index(){
       return view('import');
    }

    public function saveUploadForm(Request $request)
    {
        // dd($request->file('upload_file'));
        Excel::import(new TaskImport(), $request->file('upload_file'));
    }
}
