<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{    
    function create(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => 'required'
        ]);

        User::create([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'role_id' => $formFields['role_id'],
            'password' => Hash::make($formFields['password']),
        ]);
        return redirect('/');
    }

    function check(Request $request){
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        
        if(Auth::attempt($creds) ){
            if (Auth::user()->role_id === 1)
                return redirect()->route('secretaria.perfil');
            else
                return redirect()->route('aluno.forms');
        }else{
            return redirect()->route('secretaria.login')->with('fail','Senha inválida');
        }
    }
    
    public function checkForgotPassword(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status'=> __($status)])
                    : back() ->withErrors(['email' => __($status)]);
    }
    public function resetPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('Secretaria.dashboard')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
