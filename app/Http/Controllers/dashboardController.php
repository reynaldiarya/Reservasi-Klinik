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
        $iduser =  Auth::user()->id;
        $valid = jadwal::where('tgl_jadwal', $req['tglReservasi'])->where('jumlah_maxpasien', '>', 0)->get();
        
        if ($valid->count() < 1) {
            return back()->with('salah', 'Maaf Jadwal Tidak Tersedia silahkan pilih jadwal lain')->with('namaPasien', $req['nama_pasien'])->with('keluhan', $req['keluhan']);
        }
        $jumlah = $valid[0]['jumlah_maxpasien'] - 1;
        $jumlah2 = $valid[0]['jumlah_pasien_hari_ini'] + 1;
        jadwal::where('id_jadwal', $valid[0]['id_jadwal'])->update(['jumlah_maxpasien' => $jumlah]);
        jadwal::where('id_jadwal', $valid[0]['id_jadwal'])->update(['jumlah_pasien_hari_ini' => $jumlah2]);
        $data = [
            "nama_pasien" => $req['namaPasien'],
            'user_id' => $iduser,
            "tgl_reservasi" => $req['tglReservasi'],
            "keluhan" => $req['keluhan'],
            "no_antrian" => $jumlah2,
            "status_hadir" => 0
        ];
        reservasi::create($data);
        return redirect()->intended('reservasi')->with('reservasiBerhasil','selamat reservasi anda berhasil');
    }
}
