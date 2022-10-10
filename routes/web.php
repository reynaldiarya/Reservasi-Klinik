<?php

use App\Models\reservasi;
use App\Http\Controllers\landing;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ReservasiController;

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
Route::post('/logout-staff', [LoginController::class, "logoutstaff"]);

Route::group(['middleware' => ['auth', 'ceklevel:0']], function () {
    Route::get('/dashboard', [dashboardController::class, "index"])->name('dashboard');
    Route::post('/profile-update', [ProfileController::class, 'update']);
    Route::get('/reservasi', [ReservasiController::class, "reservasi"])->name('reservasi');
    Route::post('/reservasi', [ReservasiController::class, "createreservasipost"]);
    Route::post('/hapusreservasi', [ReservasiController::class, "hapusreservasi"]);
    Route::get('/profile', [ProfileController::class, "profile"])->name('profile');
    Route::get('/profile-update', [ProfileController::class, 'update']);
    Route::get('/rekam-medis', [RekamMedisController::class, "rekammedis"]);
});
Route::get('/login-staff', [LoginController::class, "indexstaff"])->middleware('guest')->name('login-staff');
Route::post('/login-staff', [LoginController::class, "indexstafflogin"])->middleware('guest');

Route::group(['middleware' => ['auth', 'ceklevel:1']], function () {

    Route::get('/dashboard-staff', [dashboardController::class, "indexstaff"])->name('dashboard-staff');
    Route::get('/profile-staff', [ProfileController::class, "profilestaff"])->name('profile-staff');
    Route::get('/pasien', [dashboardController::class, "kelolapasien"]);
    Route::get('/kelola-jadwal', [JadwalController::class, "kelolajadwal"]);
    Route::post('/tambah-jadwal', [JadwalController::class, "tambahjadwal"]);
    Route::post('/profile-update-staff', [ProfileController::class, 'updatestaff']);
    Route::post('/profile-update-pasien', [ProfileController::class, 'updatepasien']);
    Route::post('/edit-jadwal',[JadwalController::class,'editjadwal']); 
    Route::post('/hapus-jadwal',[JadwalController::class,'hapusjadwal']); 
    Route::get('/kelola-reservasi',[ReservasiController::class,'kelolareservasi']);
    Route::post('/edit-reservasi',[ReservasiController::class,'editreservasi']);
    Route::post('/hapus-reservasi',[ReservasiController::class,'hapusreservasi']);
    Route::get('/kelola-rekam-medis',[RekamMedisController::class,'kelolarekammedis']);
    Route::get('/tambah-rekam-medis',[RekamMedisController::class,'tambahrekammedis']);
    Route::post('/tambah-rekam-medis',[RekamMedisController::class,'tambahrekammedispost']);
    Route::post('/edit-rekam-medis',[RekamMedisController::class,'editrekammedis']);
    Route::post('/hapus-rekam-medis',[RekamMedisController::class,'hapusrekammedis']);
    route::get('/cari-jadwal',[JadwalController::class,'carijadwal']);
});
// Route::post('/login-staff', [LoginController::class, "login"])->name('login');
// Route::post('/logout', [LoginController::class, "logout"]);
// Route::get('/dashboard-staff', [dashboardController::class, "index"])->middleware('auth')->name('dashboard-staff');