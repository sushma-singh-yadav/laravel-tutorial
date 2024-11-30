<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get from redis
        $taskList = Redis::get("taskList");
        $task = json_decode($taskList);
       //dd($task);
        if($task == '')
        { // if key is not set, then fetch the data and set it
            $task = Task::all();
            Redis::set("taskList",$task);
        }
         return view('task', ['task' => $task ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addtask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $task  = $request->all();
        $task['uuid'] = Str::uuid();
        $result = Task::create($task);

        if($result){
            ///delete the existing task list and again store
            Redis::del("taskList");
            $task = Task::all();
            Redis::set("taskList",$task);

            return response()->json([
                "message" => "Task Added",
                "status" => 200
            ]);
        } else {
            return response()->json([
                "message" => "Task Not Added",
                "status" => 400
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        return view('edittask',["task"=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $taskData['title']  = $request->title;
        $taskData['description']  = $request->description;
        $result = Task::Where("uuid",$id)->update($taskData);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
