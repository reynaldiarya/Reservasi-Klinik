<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class landing extends Controller
{
    const title = 'dr. Reynaldi - Specialist Penyakit Cinta';
    public function index()
    {
        return view('landing', [
            'title' => self::title
        ]);
    }
    public function catch(Request $request)
    {
        $isi = $request['tgl'];
        
        $jumlahjadwal = jadwal::where('tgl_jadwal', '=', $isi)->where('jumlah_maxpasien', '>', 0)->count();
        return view('landing', [
            'tgl_jadwal' => $isi,
            'jumlahjadwal' => $jumlahjadwal,
            'title' => self::title
        ]);
    }
}
