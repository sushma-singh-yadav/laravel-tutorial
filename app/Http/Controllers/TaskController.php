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


            //// set particular id cache
            Redis::set("task_".$result->id,$result);

            $taskNew = Redis::get("task_".$result->id);

            return response()->json([
                "message" => "Task Added",
                "status" => 200,
                "data" =>  $taskNew
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
    public function edit($id)
    {
        //
        $taskData = Redis::get("task_".$id);
        $task = json_decode($taskData);
       // dd($task);
        if(!isset($task))
        {
            $task = Task::Where("id",$id)->get()[0];
        }
        return view('edittask',["task"=> $task]);
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
        $result = Task::Where("id",$id)->update($taskData);

        if($result){
             Redis::del("task_".$id);
             $task = Task::Where("id",$id)->get()[0];

             //// set particular id cache
            Redis::set("task_".$id,$task );

             ///delete the existing task list and again store
             Redis::del("taskList");
             $task = Task::all();
             Redis::set("taskList",$task);

            $taskData = Redis::get("task_".$id);
            return response()->json([
                "message" => "Task Updated",
                "status" => 200,
                "data" =>  $taskData
            ]);
        }
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
        $result = Task::Where("id",$id)->delete();
        if($result){
            Redis::del("task_".$id);
            
            ///delete the existing task list and again store
            Redis::del("taskList");
            $task = Task::all();
            Redis::set("taskList",$task);

            return response()->json([
                "message" => "Task Deleted",
                "status" => 200,
                "data" =>  ""
            ]);
        } else {
            return response()->json([
                "message" => "Task Not Deleted",
                "status" => 400,
                "data" =>  ""
            ]);
        }
    }
}
