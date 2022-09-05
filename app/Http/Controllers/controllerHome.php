<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerHome extends Controller
{
    public function home()
    {
        return view("home", [
            "halaman" => "dr Reynaldi - Masalah Cinta Kelar"
        ]);
    }


    public function login()
    {
        return view('login', [
            "halaman" => "Login"
        ]);
    }
    public function register()
    {
        return view('register', [
            "halaman" => "Register"
        ]);
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
