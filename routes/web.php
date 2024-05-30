<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;



Route::resource('usuarios', UsuarioController::class);
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');


