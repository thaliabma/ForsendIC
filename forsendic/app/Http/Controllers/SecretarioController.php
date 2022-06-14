<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secretario;

class SecretarioController extends Controller
{
    public function create(Request $request) {
        $formFields = $request->validate([
            'name' => 'required|min:3',
        ]);

        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public'); 
        }

        Secretario::create($formFields);
        
        return redirect(route('secretaria.perfil'))->with('message', 'Perfil criado com sucesso');
    }

    public function update(Request $request, Secretario $secretario) {
        $formFields = $request->validate([
            'name' => 'required|min:3',
        ]);

        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public'); 
        }

        $secretario->update($formFields);
        return back()->with('message', 'Perfil editado com sucesso');        
    }

    public function destroy(Secretario $secretario) {
        $secretario->delete();
        return redirect(route('secretaria.perfil'))->with('message', 'Perfil excluído com sucesso');
    }
}
