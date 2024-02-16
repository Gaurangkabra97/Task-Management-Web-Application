<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::where('role',USER_ROLE)->get()->toArray();
        return view('admin.user.index',compact('user'));
    }
}
