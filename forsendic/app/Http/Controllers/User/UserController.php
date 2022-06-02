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
    function show_desistencia() {
        return view('alunos.desistencia');
    }
    
    function show_rematricula() {
        return view('alunos.rematricula');
    }
    
    function show_trancamento() {
        return view('alunos.trancamento');
    }

    function show_perfil() {
        return view('secretaria.perfis.profilesPage');
    }

    function show_dashboard() {
        return view('secretaria.dashboard');
    }

    function create(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => 'required'
        ]);

        $formfields['password'] = Hash::make($formFields['password']);

        User::create($formFields);
        redirect('/');
    }

    function check(Request $request){
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        
        if( Auth::attempt($creds) ){
            return redirect()->route('secretaria.perfil');
        }else{
            return redirect()->route('secretaria.login')->with('fail','Senha inválida');
        }
    }

    function checkAluno(Request $request){
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::attempt($creds) ){
            return redirect()->route('aluno.forms');
        }else{
            return redirect()->route('aluno.login')->with('fail','Senha inválida');
        }
    }

    public function logoutSecretaria() {
        Auth::logout();
        return redirect('/');
    }

    public function logoutAluno() {
        Auth::logout();
        return redirect('/');
        // ->whith('message', 'Volte sempre :)');
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

    public function showForms() {
        return view('alunos.MenuFormularios');
    }
}
