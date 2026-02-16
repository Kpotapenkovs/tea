<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;

use App\Http\Controllers\TeaController;


Route::get('/login', [TeaController::class, "sessioncreate"])->name("login");

Route::post('/', [TeaController::class, 'sessionstore']);

Route::post('/logout', [TeaController::class, 'sessiondestroy']);


Route::get('/register', [RegisterController::class, "create"])->middleware("guest");

Route::post('/register', [RegisterController::class, 'store']);



    Route::get('/', [TeaController::class, 'index']);

Route::post('/', [TeaController::class, 'store']);

    Route::get('/{tea}/edit', [TeaController::class, 'edit']);


Route::delete('/{tea}', [TeaController::class, 'destroy']);


    Route::get('/{user}/create', [TeaController::class, 'create']);

    Route::put('/{tea}', [TeaController::class, 'update']);
