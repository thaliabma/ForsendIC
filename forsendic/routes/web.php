<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\SecretarioController;

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
})->name('inicio');

Route::get('/register', function() {
    return view('auth.register');
});

Route::post('/create', [UserController::class, 'create'])->name('newUser');

Route::prefix('secretaria')->name('secretaria.')->group(function() {
    Route::get('/login', [SecretariaController::class, 'login'])->name('login'); 
    Route::post('/check', [UserController::class, 'check'])->name('check');
    Route::post('/forgot-password', [UserController::class, 'checkForgotPassword'])->name('checkForgotPassword');
});

Route::prefix('aluno')->name('aluno.')->group(function(){
    Route::view('/solicitar', 'cadastroAluno')->name('solicitar');
    Route::post('/create', [AlunoController::class, 'createTemp'])->name('create');
    Route::get('/login', [AlunoController::class, 'show_otp_form'])->name('otp');
    Route::post('/check', [AlunoController::class, 'checkAluno'])->name('check'); //verificar a otp
});

Route::get('/reset-password/{token}', function($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('password.update');

Route::group([
    'middleware' => 'auth.role',
    'role' => 'secretaria'
], function() {
        Route::prefix('secretaria')->name('secretaria.')->group(function(){
            //acessar perfil
            Route::get('/perfil', [SecretariaController::class, 'index_perfil'])->name('perfil'); 
            
            // view de criar perfil
            Route::get('/perfil/novo', [SecretariaController::class, 'novo_perfil'])->name('novoPerfil'); 
            
            // criar perfil 
            Route::post('/perfil/criar', [SecretarioController::class, 'create'])->name('criarPerfil');            
            
            // entrar no dashboard com o perfil
            Route::get('/dashboard/{secretario}', [SecretariaController::class, 'show_dashboard'])->name('dashboard');
            // ver editar perfil
            Route::get('/perfil/{secretario}', [SecretariaController::class, 'show_editar'])->name('edit');
            
            // editar perfil
            Route::put('/editar/{secretario}', [SecretarioController::class, 'update'])->name('update');
            
            // excluir perfil
            Route::delete('/excluir/{secretario}', [SecretarioController::class, 'destroy'])->name('excluir');
            
            // formulario individual
            Route::get('/{secretario}/formulario/{formulario}', [SecretariaController::class, 'get_form'])->name('getForm');

            // baixar formulario
            Route::get('/formulario/download/{formulario}', [FormularioController::class, 'download'])->name('downloadForm');
            
            // email de documentação com erro
            Route::delete('/{secretario}/formulario/{formulario}/invalido', [SecretariaController::class, 'erro_na_documentacao_email'])->name('erroEmail');
            
            // mudar o status do formulário
            Route::put('/formulario/{formulario}/status', [SecretariaController::class, 'mudar_status'])->name('mudarStatus');
            
            // sair
            Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        });
    });
    
    Route::group([
        'middleware' => 'auth.role',
        'role' => 'aluno'
    ], function(){
        Route::prefix('aluno')->name('aluno.')->group(function(){
            // menu de formulários
            Route::get('/forms', [AlunoController::class, 'showForms'])->name('forms');
            
            // formulario de desistencia
            Route::get('/desistencia', [AlunoController::class, 'show_desistencia'])->name('desistencia');
            
            // formulario de rematricula
            Route::get('/rematricula', [AlunoController::class, 'show_rematricula'])->name('rematricula');
            
            // formulario de trancamento
            Route::get('/trancamento', [AlunoController::class, 'show_trancamento'])->name('trancamento');
            
            // logout aluno
            Route::post('/logout', [AlunoController::class, 'logout'])->name('logout');
            
            // enviar formulário
            Route::post('/formulario/postar', [FormularioController::class, 'store'])->name('postar');
    });
});