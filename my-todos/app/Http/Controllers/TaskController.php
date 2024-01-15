<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {

        $tasks = Task::all();
        
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }   
    public function form() {

        $tasks = Task::all();
        
        return view('tasks.form', [ 
            'tasks' => $tasks,
        ]);
    }   

    public function store(Request $request) {

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->date = $request->date;
        $task->state = 0;
        $task->favourite = 0;

        $task->save(); 

        //$tasks = Task::all();
        
        return redirect()->route('tasks.index'); /* Redirects towards the view */
        
    }

    public function edit($id) {

        $task = Task::find($id);
        
        return view('tasks.form' , [
            'task' => $task,
        ]);
    }
    
    public function update(Request $request, $id) {
        
        $task = Task::find($id);
        
        $task->title = $request->title;
        $task->description = $request->description;
        $task->date = $request->date;
        $task->state = $request->state;
        $task->favourite = $request->favourite;
        $task->save(); 
        
        return redirect()->route('tasks.index');
    }
}
