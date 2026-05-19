<?php

use App\Http\Controllers\api\v1\BrandController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\PermissionController;
use App\Http\Controllers\api\v1\RoleController;
use App\Http\Controllers\api\v1\StoreController;
use App\Http\Controllers\api\v1\SubCategoryController;
use App\Http\Controllers\api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::group(['prefix' => '/v1', 'namespace' => 'App\Http\Controllers\api\v1'], function () {

    /************  Routes dont need token  ****************/
    // Auth Routes
    Route::prefix('/auth')->group(function () {
        Route::post('login', [UserController::class, 'login'])->name('users.login');
        Route::post('register', [UserController::class, 'register'])->name('users.register');
    });

    // brands
    Route::apiResource('brands', BrandController::class)->only('index', 'show');
    // categories
    Route::apiResource('categories', CategoryController::class)->only('index', 'show');
    // sub-categories
     Route::apiResource('sub-categories', SubCategoryController::class)->only('index', 'show');
    // stores
    Route::apiResource('stores', StoreController::class)->only('index', 'show');


    /************  Routes need token  ****************/
    Route::middleware('auth:sanctum')->group(function () {


        // ** Admin Routes **
        // permissions
        Route::apiResource('permissions', PermissionController::class)->only('index', 'show');
        // roles
        Route::apiResource('roles', RoleController::class)->except('create', 'edit');
        // brands
        Route::apiResource('brands', BrandController::class)->only('store', 'update', 'destroy');
        // categories
        Route::apiResource('categories', CategoryController::class)->only('store', 'update', 'destroy');
        // sub-categories
        Route::apiResource('sub-categories', SubCategoryController::class)->only('store', 'update', 'destroy');
        //stores
        Route::apiResource("stores", StoreController::class)->only('update', 'destroy','store');
        // Route::post("stores", [StoreController::class, 'store'])->name('stores.store');
        // auth routes
        Route::prefix('/auth')->group(function () {
            Route::get('user', [UserController::class, 'user'])->name('users.user');
            Route::post('logout', [UserController::class, 'logout'])->name('users.logout');
        });
    });
});
