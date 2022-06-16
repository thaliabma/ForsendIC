<?php

namespace App\Http\Controllers;

use App\Mail\SendOtp;
use App\Models\User;
use App\Models\Aluno;
use App\Rules\OnlyICValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AlunoController extends Controller
{
    public function show_otp_form($email) {
        return view('getotp', [
            'email'=> $email,
        ]);
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
            'email' => ['required', 'email', new OnlyICValidation],
        ]);
        
        $existente = User::where('email', $formFields['email'])->first();
        if ($existente) {
            return $this->show_otp_form($existente['email']);
        }

        $password = rand(100000, 999999); //otp
        //$password = '123456';
        User::create([
            'name' => 'Aluno',
            'email' => $formFields['email'],
            'role_id' => 2,
            'password' => Hash::make($password)
        ]);

         if (Mail::to($formFields['email'])->send(new SendOtp($password))) {
            return $this->show_otp_form($formFields['email']);
         }
         else {
             return redirect()->back()->with([
                 'status' => 'Não conseguimos enviar a mensagem'
             ]);
         }
    }

    function checkAluno(Request $request){
        $formFields = $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|max:30'
        ],[
            'email.exists'=>'Email inválido'
        ]);

        if(Auth::attempt(['email' => $formFields['email'], 'password' => $formFields['password']]) ){
            return redirect()->route('aluno.forms');
        }else{
            return $this->show_otp_form($formFields['email']);
        }
    }

    public function logout() {
        $user = Auth::id();
        Auth::logout();
        User::destroy($user);
        return redirect('/');
    }
}
