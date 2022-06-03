<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Aluno;
use Illuminate\Http\Request;
use Ichtrojan\Otp\Models\Otp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{

    public function showForms() {
        return view('alunos.MenuFormularios');
    }

    function show_rematricula() {
        return view('alunos.rematricula');
    }
    
    function show_trancamento() {
        return view('alunos.trancamento');
    }

    function show_desistencia() {
        return view('alunos.desistencia');
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

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
