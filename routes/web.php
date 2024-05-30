<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;



Route::resource('usuarios', UsuarioController::class);
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');



Route::get('/', function () {
    return view('welcome');
});


Route::get('/enviar-notificacion', function () {
    return view('emails.notificar');
});
