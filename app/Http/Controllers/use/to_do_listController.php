<?php

namespace App\Http\Controllers\use;

use App\Http\Controllers\Controller;
use App\Models\to_do_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class to_do_listController extends Controller
{
    public function index(){
        $todo_list = to_do_list::where('emp_id',Auth::user()->id)->where('task_date', now()->format('Y-m-d'))->get()->toArray();
        return view('users.to_do_list.index',compact('todo_list'));
    }

    public function submit_todolist(Request $request){
        $userId = Auth::user()->id;
        $new_to_do = new to_do_list;
        $new_to_do->emp_id = $userId;
        $new_to_do->task = $request->task;
        $new_to_do->task_date =  date('Y-m-d', strtotime($request->date));
        $new_to_do->prioritie = $request->taskpriority;
        $new_to_do->task_description = $request->task_description;
        $new_to_do->save();
        return redirect()->route('user.to_do_list');
    }
}
