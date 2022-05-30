<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/login/aluno', function() {
    return view('cadastroAluno');
});

Route::get('/login/secretaria', function() {
    return view('cadastroAdmin');
});

Route::get('/secretaria/perfis', function() {
    return view('Secretaria.perfis.profilesPage');
});

Route::get('/secretaria/dashboard', function() {
    return view('Secretaria.dashboard');
});

Route::get('/alunos', function() {
    return view('alunos.MenuFormularios');
});

Route::get('/alunos/desistencia', function() {
    return view('alunos.desistencia');
});

Route::get('/alunos/rematricula', function() {
    return view('alunos.rematricula');
});

Route::get('/alunos/trancamento', function() {
    return view('alunos.trancamento');
});