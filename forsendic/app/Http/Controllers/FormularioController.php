<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Secretario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FormularioController extends Controller
{
    public function store(Request $request) {
        // dd($request);

        $formFields = $request->validate([
            'aluno_nome' => ['required', 'min:3', 'max:120'],
            'aluno_matricula' => 'required|numeric',
            'aluno_email' => ['required','email'],
            'demanda' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $arquivo = $request->file('file')->storeAs(
            'formularios', 
            $formFields['aluno_matricula'] . '_' . $request->file->getClientOriginalName()
        );
        
        if (Formulario::create([
            'aluno_nome' => $formFields['aluno_nome'],
            'aluno_matricula' => $formFields['aluno_matricula'],
            'aluno_email' => $formFields['aluno_email'],
            'demanda' => $formFields['demanda'],
            'status' => 'Recebido',
            'file' => $arquivo,
            'historico' => false,
        ]))
            return redirect(route('aluno.forms'))->with('message', 'Formulário enviado com sucesso');
        else
            return redirect(route('aluno.forms'))->with('message', 'Ocorreu um erro no envio do formulário. Tente novamente.');
            
    }

    public function download(Formulario $formulario) {
        $file_name = explode('/', $formulario['file']);
        $path = storage_path('app\\formularios').'\\' .$file_name[1];
        return Response::download($path, $file_name[1]);
    }

    public function destroy(Secretario $secretario, Formulario $formulario) {
        if ($formulario['status'] != 'Deferido' && $formulario['status'] != 'Indeferido')
            return redirect()->back()->with('message', 'O formulário ainda não pode ser excluído');

        if ($formulario->delete()) {
            return redirect()->route('secretaria.dashboard', ['secretario' => $secretario])
                    ->with('message', 'Formulário excluído dos registros');
        }
        else
            return redirect()->back()->with('message', 'Um erro ocorreu na exclusão do formulário');
    }
}
