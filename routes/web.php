<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

Route::get('/', function () {
    //return view('welcome');
    return redirect('registros/create');
});

Route::resource('registros', RegistroController::class);
