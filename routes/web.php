<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| Backed Route
|--------------------------------------------------------------------------
 */
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    //Profile Update Route
    Route::post('/profile-store', [App\Http\Controllers\HomeController::class, 'store'])->name('profile.store');
    //User Route
    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', [UserController::class, 'index'])->name('user.list');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    });
    //Client Route
    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', [ClientController::class, 'index'])->name('user.list');
        Route::post('create', [ClientController::class, 'create'])->name('create.store');
        Route::post('store', [ClientController::class, 'store'])->name('user.store');
        Route::get('edit/{id}', [ClientController::class, 'edit'])->name('user.edit');
        Route::post('update/{id}', [ClientController::class, 'update'])->name('user.update');
        Route::delete('delete/{id}', [ClientController::class, 'destroy'])->name('user.delete');
    });
});
