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

        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public'); 
        }

        Secretario::create($formFields);
        
        return redirect(route('secretaria.perfil'))->with('message', 'Perfil criado com sucesso');
    }
}
