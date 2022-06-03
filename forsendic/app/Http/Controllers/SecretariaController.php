<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SecretariaController extends Controller
{
    function show_perfil() {
        return view('secretaria.perfis.profilesPage');
    }

    function show_dashboard() {
        return view('secretaria.dashboard');
    }

    

}
