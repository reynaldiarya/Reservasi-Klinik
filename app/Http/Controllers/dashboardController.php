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
    public function indexstaff()
    {
        return view('layouts.dashboardstaff', [
            'title' => self::title . ' Dashboard',
        ]);
    }
  

    public function rekammedis()
    {

        $rekam = rekam_medis::latest()->where('user_id', Auth::user()->id)->paginate(5);
        return view('layouts.rekam-medis', [
            'title' => self::title . " Rekam medis",
            'rekam'  => $rekam

        ]);
    }
  
    public function kelolapasien()
    {
        $all = User::where('level','0')->paginate(5);
        return view('layouts.kelolapasien',[
            'title' => self::title . ' Kelola Pasien',
            'user'=>$all
        ]);
    }
   

   
}
