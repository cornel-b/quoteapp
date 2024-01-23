<?php

use App\Http\Controllers\UserController;
use App\Quote\Quote;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('login', [UserController::class, 'login'])->name('api.user.login');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'profile']);
        Route::get('/logout', [UserController::class, 'logout']);
    });

    Route::prefix('quotes')->group(function () {
        Route::get('/', function () {
            return Quote::fetch();
        });
        Route::get('/refresh', function () {
            return Quote::fetch(true);
        });
    });
});
