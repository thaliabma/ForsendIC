<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('secretaria')->name('secretaria.')->group(function() {
    Route::middleware(['guest'])->group(function() {
        // Route::view('/', 'inicio')->name('inicio');
        Route::view('/login', 'cadastroAdmin')->name('login'); //secretaria123
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });
    
    Route::middleware(['auth'])->group(function() {
        Route::view('/dashboard', 'Secretaria.dashboard')->name('dashboard');
        // Route::get('/login', function() {
        //     return redirect(route('secretaria.dashboard'));
        // });

        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });

});


Route::get('/', function () {
    return view('inicio');
})->name('inicio');


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


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

