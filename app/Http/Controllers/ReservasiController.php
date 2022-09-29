<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\reservasi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorereservasiRequest;
use App\Http\Requests\UpdatereservasiRequest;


class ReservasiController extends Controller
{
    const title = 'dr. Reynaldi - Specialist Penyakit Cinta || ';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function hapusreservasi(Request $req)
    {
        $id= $req['id'];
        $tgl =$req['tgl'];
        reservasi::where('id_reservasi',$id)->delete();
        $jadwal = jadwal::where('tgl_jadwal',$tgl);
        $reservasi = reservasi::where('tgl_reservasi',$tgl);
        $jadwal->increment('jumlah_maxpasien');
        $jadwal->decrement('jumlah_pasien_hari_ini');
        $reservasi->decrement('no_antrian');
        return back()->with('hapus','Data berhasil di hapus');

    }
    public function createreservasipost(Request $req)
    {
        $iduser =  Auth::user()->id;
        $valid = jadwal::where('tgl_jadwal', $req['tglReservasi'])->where('jumlah_maxpasien', '>', 0)->get();

        if ($valid->count() < 1) {
            return back()->with('salah', 'Maaf Jadwal Tidak Tersedia silahkan pilih jadwal lain')->with('namaPasien', $req['namaPasien'])->with('keluhan', $req['keluhan']);
        }
        $jumlah = $valid[0]['jumlah_maxpasien'] - 1;
        $jumlah2 = $valid[0]['jumlah_pasien_hari_ini'] + 1;
        $data = [
            "nama_pasien" => $req['namaPasien'],
            'user_id' => $iduser,
            "tgl_reservasi" => $req['tglReservasi'],
            "keluhan" => $req['keluhan'],
            "no_antrian" => $jumlah2,
            "status_hadir" => 0
        ];
        jadwal::where('id_jadwal', $valid[0]['id_jadwal'])->update(['jumlah_maxpasien' => $jumlah]);
        jadwal::where('id_jadwal', $valid[0]['id_jadwal'])->update(['jumlah_pasien_hari_ini' => $jumlah2]);
        reservasi::create($data);
        return redirect()->intended('reservasi')->with('reservasiBerhasil', 'Selamat Reservasi Anda Berhasil');
    }
    public function reservasi()
    {
        $reservasi = reservasi::orderBy('tgl_reservasi','desc')->where('user_id', Auth::user()->id)->paginate(5);

        return view('layouts.reservasi', [
            'title' => self::title . ' Reservasi',
            'reservasi' => $reservasi
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorereservasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorereservasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function show(reservasi $reservasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function edit(reservasi $reservasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatereservasiRequest  $request
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatereservasiRequest $request, reservasi $reservasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservasi $reservasi)
    {
        //
    }
}
