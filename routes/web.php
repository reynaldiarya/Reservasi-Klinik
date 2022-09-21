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
Route::get('/logout', [LoginController::class, "logout"]);

Route::group(['middleware' => ['auth', 'ceklevel:0']], function () {
    Route::post('/profile-update', [ProfileController::class, 'update']);
    Route::get('/dashboard', [dashboardController::class, "index"])->name('dashboard');
    Route::get('/reservasi', [dashboardController::class, "reservasi"])->name('reservasi');
    Route::post('/reservasi', [dashboardController::class, "reservasi"]);
    Route::get('/profile', [dashboardController::class, "profile"])->name('profile');
    Route::get('/create-reservasi', [dashboardController::class, "createreservasi"]);
    Route::post('/create-reservasi', [dashboardController::class, "createreservasipost"]);
    Route::post('/rekam-medis', [dashboardController::class, "rekammedispost"]);
    Route::get('/profile-update', [ProfileController::class, 'update']);
    Route::get('/rekam-medis', [dashboardController::class, "rekammedis"]);
});
Route::get('/login-staff', [LoginController::class, "indexstaff"])->middleware('guest');
Route::post('/login-staff', [LoginController::class, "indexstafflogin"])->middleware('guest');

Route::group(['middleware' => ['auth', 'ceklevel:1']], function () {
    
    Route::get('/dashboardstaff', [dashboardController::class, "indexstaff"])->name('dashboardstaff');
    Route::get('/profile-staff', [dashboardController::class, "profilestaff"])->name('profile-staff');
    Route::post('/profile-update-staff', [ProfileController::class, 'updatestaff']);
    
});
// Route::post('/login-staff', [LoginController::class, "login"])->name('login');
// Route::post('/logout', [LoginController::class, "logout"]);
// Route::get('/dashboard-staff', [dashboardController::class, "index"])->middleware('auth')->name('dashboard-staff');