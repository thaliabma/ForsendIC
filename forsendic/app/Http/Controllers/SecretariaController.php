<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Formulario;
use App\Models\Secretario;
use Illuminate\Http\Request;
use App\Mail\DocumentacaoErrada;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SecretariaController extends Controller
{
    public function login() {
        return view('cadastroAdmin');
    }

    public function index_perfil() {
        return view('secretaria.perfis.profilesPage', [
            'secretarios' => Secretario::latest()->get()
        ]);
    }
    
    public function show_dashboard(Secretario $secretario) {
        return view('secretaria.dashboard',[
            'secretario' => $secretario,
            'forms' => Formulario::latest()->filter(request(['demanda', 'status', 'search']))->get(),
        ]);
    }

    public function novo_perfil() {
        return view('secretaria.perfis.novoPerfil');
    }

    public function show_editar(Secretario $secretario) {
        return view('secretaria.perfis.editar', ['secretario' => $secretario]);
    }

    public function get_form(Secretario $secretario, Formulario $formulario) {
        if (is_null($formulario['editado_por']))
            $editor = null;
        else
            $editor = Secretario::find($formulario['editado_por']);
        return view('secretaria.formulario', [
            'formulario' => $formulario,
            'editor' => $editor,
            'secretario' => $secretario
        ]);   
    }

    public function erro_na_documentacao_email(Request $request) {
        $formFields = $request->validate([
            'texto' => ['required', 'min:3', 'max:2048'],
            'aluno_email' => ['required', 'email']
        ]);
        
        if (Mail::to($formFields['aluno_email'])->send(new DocumentacaoErrada($formFields['texto']))) {
            return redirect()->back()->with('message', 'Email enviado para o discente com sucesso');
        }
        else
            return redirect()->back()->with('message', 'Um erro ocorreu no envio do email ao discente');
    }

    public function mudar_status(Formulario $formulario, Request $request) {
        $formFields = $request->validate([
            'status' => 'required',
            'editado_por' => 'required'
        ]);
        
        $formulario->update($formFields);
        
        if ($formFields['status'] === 'Enviado') {
            //algo que sinalize que o formulário foi enviado
        }
        else if($formFields['status'] === 'Concluído') {
            //algo que sinalize que o formulário foi concluído 
        }
        return redirect()->back()->with('message', 'Status do formulário alterado com sucesso');
    }
}
