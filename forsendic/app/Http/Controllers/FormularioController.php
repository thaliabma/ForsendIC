<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;
use Faker\Core\File;

class FormularioController extends Controller
{
    public function store(Request $request) {
        // dd($request);

        $formFields = $request->validate([
            'aluno_nome' => ['required', 'min:3', 'max:120'],
            'aluno_matricula' => 'required|numeric',
            'aluno_email' => ['required','email'],
            'demanda' => 'required',
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $arquivo = $request->file('file')->storeAs(
            'formularios', 
            $formFields['aluno_matricula'] . '_' . $request->file->getClientOriginalName()
        );
        
        Formulario::create([
            'aluno_nome' => $formFields['aluno_nome'],
            'aluno_matricula' => $formFields['aluno_matricula'],
            'aluno_email' => $formFields['aluno_email'],
            'demanda' => $formFields['demanda'],
            'status' => 'Recebido',
            'file' => $arquivo,
        ]);

        return redirect(route('aluno.forms'))->with('message', 'Formulário enviado com sucesso');
    }

    public function download($form) {
        $file = Formulario::first($form);
        return response()->download(storage_path('app/formularios/'.$file['name']));
    }
}
