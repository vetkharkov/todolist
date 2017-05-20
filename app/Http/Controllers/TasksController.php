<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('welcome', compact('user'));
    }

    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
//        $task = new Task();
//        $task->title = $request->title;
//        $task->description = $request->description;
//        $task->created_at = $request->date;
//        $task->user_id = Auth::id();
//        $task->save();
//dd($request);
        if ((!empty($request->title)) && (!empty($request->description))) {

            Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => $request->date,//date("Y-m-d"),
                'user_id' => Auth::id()
            ]);
        }
        return redirect('/');
    }

    public function edit(Task $task)
    {

        if (Auth::check() && Auth::user()->id == $task->user_id) {
            return view('edit', compact('task'));
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, Task $task)
    {
//        dd($request);
        if (isset($_POST['delete'])) {
            $task->delete();
            return redirect('/');
        } else {
//            dd($request->date);
            $task->title = $request->title;
            $task->description = $request->description;
            $task->created_at = $request->date;
            $task->save();
            return redirect('/');
        }
    }
}