<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    const title = 'dr. Reynaldi - Specialist Penyakit Cinta || dashboard';

    public function index()
    {
        return view('layouts.dashboard-pasien',[
            'title' => self::title,
            'dashboard' => true
        ]);
    }
}

