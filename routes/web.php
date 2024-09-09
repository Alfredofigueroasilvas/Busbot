<?php

<<<<<<< HEAD
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

=======
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;



Route::resource('usuarios', UsuarioController::class);
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');



Route::get('/', function () {
    return view('welcome');
});

>>>>>>> aa49d920e4b842ef0fcf84891abdabe605afddc6

Route::get('map', MapController::class);
Route::get('edituser', EditUserController::class);
Route::get('crud', CrudController::class);
Route::resource('usuarios', UsuarioController::class);
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('enviar-notificacion', function() {
    return view('emails.notificar');
});
<<<<<<< HEAD

require __DIR__.'/auth.php';
=======
>>>>>>> aa49d920e4b842ef0fcf84891abdabe605afddc6
