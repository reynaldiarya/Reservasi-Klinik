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
    const title = 'Dashboard - dr. Reynaldi';


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
        $countallrekammedis = rekam_medis::count();
        $countallreservasi = reservasi::count();
        $countallpasien = User::where('level','0')->count();
        return view('layouts.dashboardstaff', [
            'title' => self::title . ' Dashboard',
            'countallrekammedis' => $countallrekammedis,
            'countallreservasi' => $countallreservasi,
            'countallpasien' => $countallpasien
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
