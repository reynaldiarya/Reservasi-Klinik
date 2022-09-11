<?php

use App\Http\Controllers\landing;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\dashboardController;
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

Route::get('/', [landing::class, "index"])->name('base');
Route::post('/', [landing::class, "catch"]);
Route::get('/login', [LoginController::class, "index"])->middleware('guest');
Route::post('/login', [LoginController::class, "login"]);
Route::post('/logout', [LoginController::class, "logout"]);
Route::post('/register', [RegisterController::class, "register"]);
Route::get('/register', [RegisterController::class, "index"])->middleware('guest');
Route::get('/dashboard', [dashboardController::class, "index"])->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');


