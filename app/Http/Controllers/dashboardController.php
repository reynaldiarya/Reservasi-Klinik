<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    const title = 'dr. Reynaldi - Specialist Penyakit Cinta || ';

    public function index()
    {
        return view('layouts.dashboard-pasien', [
            'title' => self::title . ' Dashboard',
        ]);
    }
    public function reservasi()
    {
        return view();
    }
    public function profile()
    {
        return view('layouts.profilepasien', [
            'title' => self::title . "Profile"
        ]);
    }
    public function rekammedis()
    {
        return view('pasien.rekammedispasien');
    }
}
