<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secretario;

class SecretarioController extends Controller
{
    public function create(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
        ]);

        // if ($request->hasFile('photo'))
        //     $formFields['photo'] = $request->file('photo')

        Secretario::create($formFields);
        
        redirect(route('secretaria.perfil'))->with('message', 'Perfil criado com sucesso');

    }
}
