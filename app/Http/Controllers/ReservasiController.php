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
    public function kelolareservasi()
    {
        $kelolareservasi = reservasi::orderBy('tgl_reservasi')->orderBy('no_antrian')->paginate(5);
        return view('layouts.kelolareservasi',[
            'reservasi' => $kelolareservasi,
            'title' => self::title . ' Kelola Reservasi'

        ]);
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
    public function editreservasi(Request $req)
    {
        $reservasi = reservasi::where('id_reservasi',$req['id'])->get();
        if ($reservasi[0]->status_hadir==1&&$req['status']==2) {
                $jadwal =  jadwal::where('tgl_jadwal',$req['tgl'])->get();
                jadwal::where('tgl_jadwal',$req['tgl'])->update(['jumlah_maxpasien'=>$jadwal[0]->jumlah_maxpasien+1]);
            }else if($reservasi[0]->status_hadir==2&&$req['status']==1){
                $jadwal =  jadwal::where('tgl_jadwal',$req['tgl'])->get();
                jadwal::where('tgl_jadwal',$req['tgl'])->update(['jumlah_maxpasien'=>$jadwal[0]->jumlah_maxpasien-1]);
        }
        reservasi::where('id_reservasi',$req['id'])->update(['status_hadir'=>$req['status']]);
        return back()->withSuccess('Data Berhasil Diubah');
    }
    
    public function hapusreservasi(Request $req)
    {
        reservasi::where('id_reservasi',$req['id'])->delete();
        reservasi::where('id_reservasi',$req['id'])->update(['status_hadir'=>$req['status']]);
        $jadwal = jadwal::where('tgl_jadwal',$req['tgl'])->get();
        jadwal::where('tgl_jadwal',$req['tgl'])->update(['jumlah_maxpasien'=>$jadwal[0]->jumlah_maxpasien +1]);
        return back()->withSuccess('Data Berhasil Dihapus');
        
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
