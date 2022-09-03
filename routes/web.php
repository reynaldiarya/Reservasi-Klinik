<?php

use App\Http\Controllers\controllerHome;
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
// /
// /about
// /reservasi
// /contact-us
// /login
// /register
// /dashboard
// /dashboard-klink
// /admin-dash
// /dashboard/reservasi
// /dashboard/edit-profile
// /dashboard-klinik/jadwal
// /dashboard-klinik/dokter
// /dashboard-klinik/reservasi

Route::get('/', [controllerHome::class, 'home']);
Route::get('/about', [controllerHome::class, 'home']);
Route::get('/reservasi', [controllerHome::class, 'reservasi']);
Route::get('/login', [controllerHome::class, 'login']);
Route::get('/register',  [controllerHome::class, 'register']);
Route::get('/dashboard', [controllerHome::class, 'dashboard']);
Route::get('/dashboard-klink', [controllerHome::class, 'dashboardKlink']);
Route::get('/admin-dash',  [controllerHome::class, 'AdminDash']);
