<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        // $tasks=Task::all();
        // $com = Task::count();
        $tasks=Task::orderBy('created_at')->get();
        return view('tasks.index',compact('tasks')); 
    }

    public function show (Task $task_show)
    { 
        /** 
         *findorFail() method If the exception is not caught , 
         *a 404 HTTP response is automatically sent back to the user.
         */
        // $task =Task::findOrFail($id);
        return view ('tasks.show',compact('task_show'));           
    }  

    public function store (Request $request)
    {
        $request->validate([
            'name' => 'bail|required|alpha_num|max:10|unique:tasks,name,|min:5',
        ]); 
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return redirect('tasks')->with('status', 'Tasks added Successfuly!');
    } 

    public function destroy (Task $task_delete)
    {
        // $task = Task::find($id);
        $task_delete->delete();
        return redirect('tasks');    
    }

    public function ShowEditTask(Task $task_edit)
    {
        // $task_edit =Task::findOrFail($id);
        $tasks =Task::all(); 
        return view('tasks.index',compact('task_edit','tasks')); 
    }   

    public function Update(Request $request,Task $task_update)
    { 
        $request->validate([
            'name' => 'bail|required|alpha_num|min:5|max:10|unique:tasks,name,'.$task_update->id.'' ,
        ]);

        // $task = Task::find($id);
        $task_update->name = $request->name; 
        $task_update->save();
        return redirect('tasks')->with('status', 'Tasks Updated Successfuly!');    
    }

}
