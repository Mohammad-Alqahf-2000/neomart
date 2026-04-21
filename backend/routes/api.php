<?php

use App\Http\Controllers\api\v1\BrandController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\PermissionController;
use App\Http\Controllers\api\v1\RoleController;
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
    Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
    // categories
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    // sub-categories
    Route::get('sub-categories', [SubCategoryController::class, 'index'])->name('sub-categories.index');


    /************  Routes need token  ****************/
    Route::middleware('auth:sanctum')->group(function () {


        // ** Admin Routes **
        Route::middleware('role:admin')->group(function () {
            // permissions
            Route::apiResource('permissions', PermissionController::class)->only('index','show');
            // roles
            Route::apiResource('roles', RoleController::class)->except('create', 'edit');
            // brands
            Route::apiResource('brands', BrandController::class)->except('index', 'create', 'edit');
            // categories
            Route::apiResource('categories', CategoryController::class)->except('index', 'create', 'edit');
            // sub-categories
            Route::apiResource('sub-categories', SubCategoryController::class)->except('index', 'create', 'edit');
        });

        // ** Seller Routes **
        // ** Assistant Routes **
        // ** Client Routes **
        // ** Admin & Seller Routes **
        // ** Seller & Assistant Routes **
        // ** All users **
        // auth routes
        Route::prefix('/auth')->group(function () {
            Route::get('user', [UserController::class, 'user'])->name('users.user');
            Route::post('logout', [UserController::class, 'logout'])->name('users.logout');
        });
    });
});
