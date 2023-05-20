<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\UserProfile;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $email = $request->email;
        
        $user = User::where('email', '=', $email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                if($user->stat == 1){
                    $request->session()->put('loginId', $user->id);
                    $profile = UserProfile::where('uid', '=', $user->id)->first();
                    $request->session()->put('user', $user);
                    $request->session()->put('pid', $profile->id);
                    return redirect('/home');
                }else{
                    return back()->with('fail','Account inactive!!');
                }

            }else{
                return back()->with('fail','invalid password try agen!!');
            }
        }else{
            return back()->with('fail','invalid email adddress');
        }
    }
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/login');
        }else{
            return redirect('/login');
        }
        
    }
}
