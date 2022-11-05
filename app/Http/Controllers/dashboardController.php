<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\jadwal;
use App\Models\reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\rekam_medis;

class DashboardController extends Controller
{
    const title = 'Dashboard - dr. Reynaldi';

    public function index()
    {
        // $jadwal = jadwal::orderBy('tgl_jadwal','desc')->paginate(7);
        $countrekammedis = rekam_medis::where('user_id', Auth::user()->id)->count();
        $countreservasi = reservasi::where('user_id', Auth::user()->id)->count();
        // $countjadwal = jadwal::count();
        return view('pasien.dashboardpasien', [
            'title' => self::title,
            'countrekammedis' => $countrekammedis,
            'countreservasi' => $countreservasi,
            // 'countjadwal'=> $countjadwal
        ]);
    }

    public function indexstaff()
    {
        $countallrekammedis = rekam_medis::count();
        $countallreservasi = reservasi::count();
        $countallpasien = User::where('level','0')->count();
        $countalljadwal = jadwal::count();
        return view('staff.dashboardstaff', [
            'title' => self::title,
            'countallrekammedis' => $countallrekammedis,
            'countallreservasi' => $countallreservasi,
            'countallpasien' => $countallpasien,
            'countalljadwal' => $countalljadwal
        ]);
    }
    public function indexdokter()
    {
        $countallrekammedis = rekam_medis::count();
        $countallreservasi = reservasi::where('tgl_reservasi',date('Y-m-d'))->count();
        $countallpasien = User::where('level','0')->count();
        $countalljadwal = jadwal::count();
        return view('dokter.dashboarddokter',[
            'title'=> self::title,
            'countallrekammedis' => $countallrekammedis,
            'countallreservasi' => $countallreservasi,
            'countallpasien' => $countallpasien,
            'countalljadwal' => $countalljadwal
        ]);
    }

}
