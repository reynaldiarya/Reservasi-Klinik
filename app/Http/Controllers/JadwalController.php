<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorejadwalRequest;
use App\Http\Requests\UpdatejadwalRequest;

class JadwalController extends Controller
{
    const title = 'dr. Reynaldi - Specialist Penyakit Cinta || ';

    public function kelolajadwal()
    {
        $jadwal = jadwal::orderby('tgl_jadwal','desc')->paginate(5);
        return view('layouts.kelolajadwal',[
           'title' => self::title . ' Kelola Jadwal',
            'jadwal' => $jadwal
       ]);
    }
    public function tambahjadwal(Request $req)
    {
        $req->validate(['tgl_jadwal'=>'unique:jadwals']);
        $jadwal = [
            'tgl_jadwal' => $req['tgl_jadwal'],
            'jam_masuk' => $req['jam_masuk'],
            'jam_pulang' => $req['jam_pulang'],
            'jumlah_maxpasien' => $req['max_pasien']
        ];
        jadwal::create($jadwal);
        return back()->with('success', 'Jadwal Berhasil Terbuat');

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
    public function hapusjadwal(Request $req)
    { 
        jadwal::where('id_jadwal',$req['id'])->delete();
        return back()->withSuccess('Jadwal berhasil di hapus ');

    }
    public function editjadwal(Request $Req)
    {
     
        jadwal::where('id_jadwal',$Req['id'])->
        update([
        'tgl_jadwal' => $Req['tgl_jadwal'],
        'jam_masuk' => $Req['jam_masuk'],
        'jam_pulang' => $Req['jam_pulang'],
        'status_masuk' => $Req['status'],
        'jumlah_maxpasien' => $Req['jumlah_maxpasien']
     ]);

        return back()->withSuccess('Jadwal berhasil di perbarui');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorejadwalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorejadwalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatejadwalRequest  $request
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatejadwalRequest $request, jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal $jadwal)
    {
        //
    }
}
