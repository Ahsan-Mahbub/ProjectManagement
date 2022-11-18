<?php

namespace App\Http\Controllers;

use App\Models\TaskAssign;
use Illuminate\Http\Request;
use Auth;

class TaskAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = TaskAssign::orderBy('id','desc')->get();
        return view('backend.file.task.list', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskList()
    {
        $tasks = TaskAssign::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('backend.file.task.employee-task', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new TaskAssign();
        $requested_data = $request->all();
        $task->status = 1;
        $save = $task->fill($requested_data)->save();
        if($save){
            return back()->with('message','Task Assign Successfully');
        }else{
            return back()->with('error','Task Assign Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskAssign  $taskAssign
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $status = $request->status;
        $post_status = TaskAssign::findOrFail($id);
        $post_status->status = $status;
        $post_status->save();
        return redirect()->back()->with('message','TaskAssign Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskAssign  $taskAssign
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskAssign $taskAssign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskAssign  $taskAssign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskAssign $taskAssign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskAssign  $taskAssign
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = TaskAssign::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Task Successfully Deleted');
    }
}
