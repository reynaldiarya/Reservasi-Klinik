<?php

use App\Http\Controllers\landing;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProfileController;

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
Route::post('/login', [LoginController::class, "login"])->name('login');
Route::post('/logout', [LoginController::class, "logout"]);
Route::post('/register', [RegisterController::class, "register"]);
Route::get('/register', [RegisterController::class, "index"])->middleware('guest');
Route::get('/dashboard', [dashboardController::class, "index"])->middleware('auth')->name('dashboard');
Route::get('/reservasi', [dashboardController::class, "reservasi"])->middleware('auth');
Route::post('/reservasi', [dashboardController::class, "reservasi"])->middleware('auth');
Route::get('/profile', [dashboardController::class, "profile"])->middleware('auth')->name('profile');
Route::get('/rekam-medis', [dashboardController::class, "rekammedis"])->middleware('auth');
Route::post('/rekam-medis', [dashboardController::class, "rekammedispost"])->middleware('auth');
Route::post('/profile-update',[ProfileController::class,'update']);
Route::get('/profile-update',[ProfileController::class,'update']);
Route::get('/logout', [LoginController::class, "logout"]);