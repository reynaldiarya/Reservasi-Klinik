<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rekam_medis;
use Illuminate\Support\Facades\Auth;
 
class RekamMedisController extends Controller
{
    const title = 'dr. Reynaldi - Specialist Penyakit Cinta || ';
    public function rekammedis()
    {

        $rekam = rekam_medis::latest()->where('user_id', Auth::user()->id)->paginate(5);
        return view('layouts.rekam-medis', [
            'title' => self::title . " Rekam medis",
            'rekam'  => $rekam

        ]);
    }
    public function kelolarekammedis()
    {
        
        $rekam = rekam_medis::join('users','User_id','=','users.id')->orderBy('rekam_medis.tgl_periksa','desc')->select('rekam_medis.*','users.name')->paginate(5);
        return view('layouts.kelolarekammedis', [
            'title' => self::title . " Kelola Rekam medis",
            'rekam'  => $rekam

        ]);
    }

}
