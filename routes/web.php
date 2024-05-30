<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php

Route::get('/enviar-notificacion', function () {
    return view('emails.notificar');
});