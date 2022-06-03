<?php

namespace App\Http\Controllers;

use App\Mail\SendOtp;
use App\Models\User;
use App\Models\Aluno;
use Illuminate\Http\Request;
use Ichtrojan\Otp\Models\Otp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AlunoController extends Controller
{

    public function show_otp_form() {
        return view('getotp');
    }

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

    function createTemp(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $password = rand(1000, 9999); //otp
        User::create([
            'name' => 'Aluno',
            'email' => $formFields['email'],
            'role_id' => 2,
            'password' => Hash::make($password)
        ]);

        if (Mail::to($formFields['email'])->send(new SendOtp($password))) {
            return redirect(route('aluno.otp'))->with([
                '$email' => $formFields['email'],
                '$status'=> 'A OTP foi enviada ao email. Insira-a abaixo'
            ]);
        }
        else {
            return redirect()->back()->with([
                'status' => 'Não conseguimos enviar a mensagem'
            ]);
        }
    }

    function checkAluno(Request $request){
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|max:30'
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
        // delete user logo em seguida
        return redirect('/');
    }
}
