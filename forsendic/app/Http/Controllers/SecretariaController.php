<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Secretario;

class SecretariaController extends Controller
{
    public function login() {
        return view('cadastroAdmin');
    }

    public function index_perfil() {
        return view('secretaria.perfis.profilesPage', [
            'secretarios' => Secretario::all()
        ]);
    }
    
    public function show_dashboard(Secretario $secretario) {
        return view('secretaria.dashboard',[
            'secretario' => $secretario
        ]);
    }

    public function novo_perfil() {
        return view('secretaria.perfis.novoPerfil');
    }

    public function show_editar(Secretario $secretario) {
        return view('secretaria.perfis.editar', ['secretario' => $secretario]);
    }

    // function show_dashboard() {
    //     return view('secretaria.dashboard');
    // }
}
