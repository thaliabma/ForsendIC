<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::attempt($creds) ){
            return redirect()->route('secretaria.dashboard');
        }else{
            return redirect()->route('secretaria.login')->with('fail','Incorrect credentials');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
