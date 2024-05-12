<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    print "Hola Soy Jesus Alfredo Figueroa Silvas,  Este Framework de Laravel 11 ya esta funcionando";
    return view('welcome');
});
