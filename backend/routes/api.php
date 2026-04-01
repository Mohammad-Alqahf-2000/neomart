<?php

use App\Http\Controllers\api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::group(['prefix' => '/v1', 'namespace' => 'App\Http\Controllers\api\v1'], function () {
    Route::middleware('auth:sanctum')->group(function () {});

    // Auth Routes
    Route::prefix('/auth')->group(function () {
        Route::get('user', [UserController::class, 'user'])->name('users.user')->middleware('auth:sanctum');
        Route::post('logout', [UserController::class, 'logout'])->name('users.logout');
        Route::post('login', [UserController::class, 'login'])->name('users.login');
        Route::post('register', [UserController::class, 'register'])->name('users.register');
    });
});
