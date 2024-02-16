<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(){
        return view('index');
    }

    public function submit_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email',$email)->first();
        // dd($user);
        if(!empty($user)){
            $check_password = Hash::check($password, $user->password);
            // dd($check_password);
            if($check_password){
                if($user->role == ADMIN_ROLE){
                    Auth::attempt(array('email' => $email, 'password' => $password));
                    return redirect()->route('admin.dashboard');
                }elseif($user->role == USER_ROLE){
                    Auth::attempt(array('email' => $email, 'password' => $password));
                    return redirect()->route('user.dashboard');
                }
                else {
                    return redirect()->back()->with('danger','Please enter valid credentials');
                }
            } else {
                return redirect()->back()->with('danger','Please enter valid credentials');
            }
        } else {
            return redirect()->back()->with('danger','Entered details not found');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','You have successfully logged out!');
    }

    public function register(){
        return view('register');
    }

    public function submit_register(Request $request){


        // $validator = Validator::make($request->all(), [
        //     'f_name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:3|confirmed',
        // ]);
        
        $new_user = new User;
        $new_user->first_name = $request->f_name;
        $new_user->last_name  = $request->l_name;
        $new_user->phone_number = $request->mobile_number;
        $new_user->email = $request->email;
        $new_user->password   = Hash::make($request->password);
        $new_user->role  = USER_ROLE;
        $new_user->save();
        return redirect()->route('login');

    }
}
