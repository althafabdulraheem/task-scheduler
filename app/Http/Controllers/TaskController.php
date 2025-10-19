<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Task::all();
        return view('landing',['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator=Validator::make($request->all(),['task'=>'required|min:10'],
                                                    ['task.required'=>'task field should be required',
                                                    'task.min'=>'minimum 10 characters required']);
        
        if($validator->fails())
        {
            return response()->json(['status'=>false,'errors'=>$validator->errors()->getMessageBag()]);
        }

        $task=new Task();
        $task->content=$request->task;
        if($task->save())
        {
            return response()->json(['status'=>true,'message'=>'successfully stored'],200);
        }
        else{
            return response()->json(['status'=>false,'message'=>'error while inserting'],500);

        }
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
