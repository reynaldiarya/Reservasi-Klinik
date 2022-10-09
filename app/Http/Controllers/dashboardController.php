<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\jadwal;
use App\Models\reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\rekam_medis;

class dashboardController extends Controller
{
    //
    const title = 'dr. Reynaldi - Specialist Penyakit Cinta || ';


    public function index()
    {
        $countrekammedis = rekam_medis::where('user_id', Auth::user()->id)->count();
        $countreservasi = reservasi::where('user_id', Auth::user()->id)->count();
        return view('layouts.dashboard-pasien', [
            'title' => self::title . ' Dashboard',
            'countrekammedis' => $countrekammedis,
            'countreservasi' => $countreservasi
        ]);
    }

    public function indexstaff()
    {
        return view('layouts.dashboardstaff', [
            'title' => self::title . ' Dashboard',
        ]);
    }

    public function kelolapasien()
    {
        $all = User::where('level','0')->paginate(5);
        return view('layouts.kelolapasien',[
            'title' => self::title . ' Kelola Pasien',
            'user'=>$all
        ]);
    }



}
