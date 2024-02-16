<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = User::where('role',USER_ROLE)->count();
        return view('admin.dashboard',compact('user'));
    }
}
