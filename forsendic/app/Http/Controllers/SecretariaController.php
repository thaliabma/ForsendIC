<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Secretario;
use App\Models\Formulario;

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

    public function get_form(Formulario $formulario) {
        if (is_null($formulario['editado_por']))
            $editor = null;
        else
            $editor = Secretario::find($formulario['editado_por']);
        return view('secretaria.formulario', [
            'formulario' => $formulario,
            'secretario' => $editor
        ]);
        
    }
}
