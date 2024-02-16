<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\to_do_list;
use Illuminate\Http\Request;

class to_do_listController extends Controller
{
    public function index(){
        $todo_list = to_do_list::with('user')->get()->toArray();
        return view('admin.to_do_list.index',compact('todo_list'));
    }
}
