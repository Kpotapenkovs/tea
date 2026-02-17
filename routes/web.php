<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;

use App\Http\Controllers\TeaController;


Route::get('/', function () {
    return view('tea.index');
});

Route::get('/login', [TeaController::class, "sessioncreate"])->name("login");

Route::post('/', [TeaController::class, 'sessionstore']);

Route::post('/logout', [TeaController::class, 'sessiondestroy']);


Route::get('/register', [RegisterController::class, "create"])->middleware("guest");

Route::post('/register', [RegisterController::class, 'store']);



Route::get('/homepage', [TeaController::class, 'index']);

Route::post('/homepage', [TeaController::class, 'store']);

Route::get('/homepage/{tea}/edit', [TeaController::class, 'edit']);


Route::delete('/homepage/{tea}', [TeaController::class, 'destroy']);


    Route::get('/homepage/{user}/create', [TeaController::class, 'create']);

    Route::put('/homepage/{tea}', [TeaController::class, 'update']);
