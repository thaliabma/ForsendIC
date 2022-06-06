<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Secretario;

class SecretariaController extends Controller
{
    function index_perfil() {
        return view('secretaria.perfis.profilesPage', [
            'secretarios' => Secretario::all()
        ]);
    }
    
    function show_dashboard(Secretario $secretario) {
        return view('secretaria.dashboard',[
            'secretario' => $secretario
        ]);
    }

    function novo_perfil() {
        return view('secretaria.perfis.novoPerfil');
    }

    // function show_dashboard() {
    //     return view('secretaria.dashboard');
    // }
}
