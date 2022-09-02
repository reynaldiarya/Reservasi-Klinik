<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerHome extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function reservasi()
    {
        return view('reservasi');
    }

    public function contactUs()
    {
        return view('contactUs');
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    
    public function adminDash()
    {
        return view('adminDashboard');
    }
    
    public function dashboardKlinik()
    {
        return view('dashboardKlinik');
    }
    
}
