<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Task;
use DB;

class ArchiveController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $today = date("Y-m-d H:i:s");
        $archiv = DB::table('tasks')
                    ->select('id', 'title', 'description', 'User_id', 'created_at', 'updated_at')
                    ->where('created_at', '<', $today)
                     ->get();

        return view('archive')->with('archiv', $archiv)->with('day', $today);;
    }

    public function day(){

        $user = Auth::user();
        $day = $_POST['search'];
//        $day = date("Y-m-d");// H:i:s

//        echo $day;

        $archiv = DB::table('tasks')
            ->select('id', 'title', 'description', 'User_id', 'created_at', 'updated_at')
            ->where('created_at', '=', $day)
            ->get();

        return view('archive')->with('archiv', $archiv)->with('day', $day);

    }
}