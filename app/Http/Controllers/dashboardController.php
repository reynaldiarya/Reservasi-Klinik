<?php

namespace App\Http\Controllers;

use App\Models\rekam_medis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $rekam = rekam_medis::where('user_id', Auth::user()->id)->get();
        return view('layouts.rekam-medis', [
            'title' => self::title . "Profile",
            'rekam'  => $rekam

        ]);
    }
    public function rekammedispost(Request $req)
    {
        $data = $req['id_rekam'];
        $rekam = rekam_medis::where('id_rekam_medis', $data)->get();
        return view('layouts.rekam-medis', [
            'title' => self::title . "Profile",
            'id_rekam'  => $rekam

        ]);
    }
}
