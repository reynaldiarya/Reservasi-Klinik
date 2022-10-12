<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\rekam_medis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    const title = 'Rekam Medis - dr. Reynaldi';
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
        $rekam = rekam_medis::join('users','User_id','=','users.id')
        ->orderBy('rekam_medis.tgl_periksa','desc')->select('rekam_medis.*','users.name')->paginate(5);
        return view('layouts.kelolarekammedis', [
            'title' => self::title . " Kelola Rekam medis",
            'rekam'  => $rekam,

        ]);
    }
    public function editrekammedis()
    {
        DB::table('rekam_medis')
              ->where('id_rekam_medis', request('id_user'))
              ->update([
                'nama_pasien'=>request('nama_pasien'),
                "tgl_periksa" => request("tgl_periksa"),
                "nama_penyakit"=>request("nama_penyakit"),
                "kadar_gula_darah"=>request("kadar_gula_darah"),
                "kadar_kolesterol"=>request("kadar_kolesterol"),
                "kadar_asam_urat"=>request("kadar_asam_urat"),
                "tekanan_darah"=>request("tekanan_darah"),
                "alergi_makanan"=>request("alergi_makanan"),
                "keterangan"=>request("keterangan")

              ]);
              return back()->withSuccess('Data berhasil diperbarui');



    }
    public function tambahrekammedispost(Request $req)
    {
        $req->validate(['nama_user'=>'required']);
        $data = [
            'User_id'=> request('nama_user'),
            'nama_pasien'=>request('nama_pasien'),
            "tgl_periksa" => request("tgl_periksa"),
            "nama_penyakit"=>request("nama_penyakit"),
            "kadar_gula_darah"=>request("kadar_gula_darah"),
            "kadar_kolesterol"=>request("kadar_kolesterol"),
            "kadar_asam_urat"=>request("kadar_asam_urat"),
            "tekanan_darah"=>request("tekanan_darah"),
            "alergi_makanan"=>request("alergi_makanan"),
            "keterangan"=>request("keterangan")
        ];
        if($data['kadar_gula_darah']==null){
            $data['kadar_gula_darah']= 0;
        };
        if($data['kadar_asam_urat']==null){
            $data['kadar_asam_urat']= 0;
        };
        if($data['kadar_kolesterol']==null){
            $data['kadar_kolesterol']= 0;
        };
        if($data['alergi_makanan']==null){
            $data['alergi_makanan']= '-';
        };
        if($data['tekanan_darah']==null){
            $data['tekanan_darah']= '-';
        };
        if($data['keterangan']==null){
            $data['keterangan']= '-';
        };
    rekam_medis::create($data);
        return redirect('/kelola-rekam-medis')->withSuccess('Data berhasil ditambahkan');
    }
    public function tambahrekammedis()
    {
        $pasien = User::all()->where('level','0');
        return view('layouts.tambahrekammedis',[
            'pasien'=> $pasien,
            'title' => self::title . " Kelola Rekam medis"

        ]);
    }

}
