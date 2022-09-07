<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;

class landing extends Controller
{
    public function index()
    {
        # code...
        return view('landing');
    }
    public function catch(Request $request)
    {
        $isi = $request->tgl;
        $jumlahjadwal = jadwal::where('tgl_jadwal', '=', $isi)->count();


        return view('landing', ['jumlahjadwal' => $jumlahjadwal]);
    }
}
