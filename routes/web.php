<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::middleware('auth:api')->group(function(){
    Route::apiResource('api/products', ProductController::class);
});