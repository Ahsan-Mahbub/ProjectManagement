<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
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
    Route::group(['prefix' => 'client'], function () {
        Route::get('/list', [ClientController::class, 'index'])->name('client.list');
        Route::post('store', [ClientController::class, 'store'])->name('client.store');
        Route::get('status/{id}', [ClientController::class, 'status'])->name('client.status');
        Route::get('edit/{id}', [ClientController::class, 'edit']);
        Route::post('update', [ClientController::class, 'update'])->name('client.update');
        Route::delete('delete/{id}', [ClientController::class, 'destroy'])->name('client.delete');
    });
    //Project Route
    Route::group(['prefix' => 'project'], function () {
        Route::get('/list', [ProjectController::class, 'index'])->name('project.list');
        Route::post('store', [ProjectController::class, 'store'])->name('project.store');
        Route::get('status/{id}', [ProjectController::class, 'status'])->name('project.status');
        Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
        Route::post('update/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('delete/{id}', [ProjectController::class, 'destroy'])->name('project.delete');
    });
});
