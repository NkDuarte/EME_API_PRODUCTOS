<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//* |-> Ruta de registro de usuarios
Route::post('/register', [ AuthController::class, 'register']);

//* |-> Ruta de Logueo para usuarios
Route::post('/login', [ AuthController::class, 'login']);