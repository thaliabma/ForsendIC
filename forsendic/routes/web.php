<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
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

Route::group([
    'middleware' => 'auth.role',
    'role' => 'secretaria'
], function() {
        Route::prefix('secretaria')->name('secretaria.')->group(function(){
            Route::get('/perfil', [SecretariaController::class, 'index_perfil'])->name('perfil');
            Route::get('/perfil/novo', [SecretariaController::class, 'novo_perfil'])->name('novoPerfil');
            Route::post('/perfil/criar', [SecretarioController::class, 'create'])->name('criarPerfil');            
            Route::get('/dashboard/{secretario}', [SecretariaController::class, 'show_dashboard'])->name('dashboard');
            Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        });
    });
    
    Route::group([
        'middleware' => 'auth.role',
        'role' => 'aluno'
    ], function(){
        Route::prefix('aluno')->name('aluno.')->group(function(){
            Route::get('/forms', [AlunoController::class, 'showForms'])->name('forms');
            Route::get('/desistencia', [AlunoController::class, 'show_desistencia'])->name('desistencia');
            Route::get('/rematricula', [AlunoController::class, 'show_rematricula'])->name('rematricula');
            Route::get('/trancamento', [AlunoController::class, 'show_trancamento'])->name('trancamento');
            Route::post('/logout', [UserController::class, 'logout'])->name('logout');
            
    });
});

Route::prefix('secretaria')->name('secretaria.')->group(function() {
    Route::view('/login', 'cadastroAdmin')->name('login'); //secretaria123
    Route::post('/check', [UserController::class, 'check'])->name('check');
    Route::post('/forgot-password', [UserController::class, 'checkForgotPassword'])->name('checkForgotPassword');
    Route::view('/reset-password/{token}', function($token) {
        return view('secretaria.reset-password', ['token' => $token]);
    })->name('password.reset');
    Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('password.update');
});

Route::prefix('aluno')->name('aluno.')->group(function(){
    Route::view('/solicitar', 'cadastroAluno')->name('solicitar');
    Route::post('/create', [AlunoController::class, 'createTemp'])->name('create');
    Route::get('/login', [AlunoController::class, 'show_otp_form'])->name('otp');
    Route::post('/check', [UserController::class, 'check'])->name('check'); //verificar a otp
});

// Route::get('/login/aluno', function() {
//     return view('cadastroAluno');
// });

// Route::get('/login/secretaria', function() {
//     return view('cadastroAdmin');
// });

// Route::get('/secretaria/perfis', function() {
//     return view('Secretaria.perfis.profilesPage');
// })->name('secretaria.perfis');

// Route::get('/secretaria/dashboard', function() {
//     return view('Secretaria.dashboard');
// });

// Route::get('/alunos', function() {
//     return view('alunos.MenuFormularios');
// });

// Route::get('/alunos/desistencia', function() {
//     return view('alunos.desistencia');
// });

// Route::get('/alunos/rematricula', function() {
//     return view('alunos.rematricula');
// });

// Route::get('/alunos/trancamento', function() {
//     return view('alunos.trancamento');
// });


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

