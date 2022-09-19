<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\jadwal;
use App\Models\reservasi;
use App\Models\rekam_medis;
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
        $reservasi = reservasi::where('user_id', Auth::user()->id)->get();


        return view('layouts.reservasi', [
            'title' => self::title . ' Reservasi',
            'reservasi' => $reservasi
        ]);
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
            'title' => self::title . " Rekam medis",
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
    public function createreservasi()
    {

        return view('layouts.reservasi', [
            'title' => self::title . ' Create Reservasi',
            'create' => true
        ]);
    }
    public function createreservasipost(Request $req)
    {
        $data = [
            "namapasien" => $req['namaPasien'],
            "tglReservasi" => $req['tglReservasi'],
            "keluhan" => $req['keluhan']
        ];
        $valid = jadwal::where('tgl_jadwal',$data['tglReservasi'])->where('jumlah_maxpasien','>',0)->get();
        if($valid->count()<1){
            return back()->with('salah', 'Maaf Jadwal Tidak Tersedia')->with('namaPasien',$data['namapasien'])->with('keluhan', $data['keluhan']);
        }
        return view('layouts.reservasi', [
            'title' => self::title . ' Create Reservasi',
            
        ]);
    }
}
