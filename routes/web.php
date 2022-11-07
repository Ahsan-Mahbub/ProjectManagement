<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/*
|--------------------------------------------------------------------------
| Front View View
|--------------------------------------------------------------------------
 */
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Back View View
|--------------------------------------------------------------------------
 */
Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    //
});

Route::get('/home', function () {
    return view('home');
});
