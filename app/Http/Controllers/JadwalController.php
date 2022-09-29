<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Client\Request;
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
    public function kelolajadwal2(Request $req)
    {
        $jadwal = [
            'tgl_jadwal' => $req['tglReservasi'],
            'jam_masuk' => $req['jamMasuk'],
            'jam_pulang' => $req['jamKeluar'],
            'jumlah_maxpasien' => $req['maxPasien']
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
