<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Formulario;
use App\Models\Secretario;
use App\Mail\StatusEnviado;
use App\Mail\StatusDeferido;
use Illuminate\Http\Request;
use App\Mail\StatusIndeferido;
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

    public function erro_na_documentacao_email(Secretario $secretario, Formulario $formulario, Request $request,) {
        $formFields = $request->validate([
            'texto' => ['required', 'min:3'],
        ]);
        $email = $formulario['aluno_email'];
        
        $formulario->delete();

        if (Mail::to($email)->send(new DocumentacaoErrada($formFields['texto']))) {
            return redirect()->route('secretaria.dashboard', ['secretario' => $secretario])
                ->with('message', 'Email enviado para o discente e formulário excluído');
        }
        else
            return redirect()->back()->with('message', 'Um erro ocorreu no envio do email ao discente');
    }

    public function mudar_status(Formulario $formulario, Request $request) {
        $formFields = $request->validate([
            'status' => 'required',
            'editado_por' => 'required'
        ]);

        $mail = new StatusDeferido();

        if ($formFields['status'] === 'Enviado')
            $mail = new StatusEnviado();
        else if($formFields['status'] === 'Deferido')
            $mail = new StatusDeferido();
        else if ($formFields['status'] === 'Indeferido')
            $mail = new StatusIndeferido();

        $formulario->update($formFields);
        $aluno_email = $formulario['aluno_email'];

        if (Mail::to($aluno_email)->send($mail))
            return redirect()->back()
                ->with('message', 'Status do formulário alterado com sucesso');
        else
            return redirect()->back()
                ->with('message', 'Um erro ocorreu no envio do email ao discente');

    }
}
