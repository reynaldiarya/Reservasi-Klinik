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
    const title = 'Reservasi - dr. Reynaldi';

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
            return back()->with('salah', 'Maaf jadwal tidak tersedia, silahkan pilih jadwal lain')->with('namaPasien', $req['namaPasien'])->with('keluhan', $req['keluhan']);
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
        return redirect()->intended('reservasi')->with('reservasiBerhasil', 'Reservasi Anda telah berhasil');
    }
    public function reservasi()
    {
        $reservasi = reservasi::orderBy('tgl_reservasi', 'desc')->where('user_id', Auth::user()->id)->paginate(5);

        return view('layouts.reservasi', [
            'title' => self::title . ' Reservasi',
            'reservasi' => $reservasi
        ]);
    }
    public function carireservasi()
    {
        if(request('data')== null){
            return;
        }
        $data = reservasi::where('nama_pasien', 'like', '%' . request('data') . '%')
            ->orWhere('tgl_reservasi', 'like', '%' . request('data') . '%')
            ->orWhere('keluhan', 'like', '%' . request('data') . '%')->get();

        $no = 0;
        $output = '';
        foreach ($data as $item) {
            $no++;
            if ($item->status_hadir == 0) {
                $status = 'Tidak Hadir';
            }
            if ($item->status_hadir == 1) {
                $status = 'Hadir';
            }


            $output .= '<tr>
                                            <td class="align-middle">' . $no . '</td>
                                            <td class="align-middle">' . $item->nama_pasien . '</td>
                                            <td class="align-middle">' .  date("d M Y", strtotime($item->tgl_reservasi)) . '</td>
                                            <td class="align-middle">' . $item->keluhan . '</td>
                                            <td class="align-middle">' . $item->no_antrian . '</td>
                                            <td>
                                            <form action="edit-reservasi" class="my-0" method="post">
                                               ' . csrf_field() . '
                                                <input type="hidden" name="id" value="' . $item->id_reservasi . '">
                                                <input type="hidden" name="tgl" value="' . $item->tgl_reservasi . '">

                                                <div class="row">
                                                <div class="col">
                                                <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                    <option selected value="' . $item->status_hadir . '">' . $status . '</option>
                                                        <option value="0">Tidak Hadir</option>
                                                        <option value="1">Hadir</option>
                                                    </select>
                                                    </div>
                                                    <div class="col">
                                                    <button title="Simpan" type="submit" class="btn btn-primary"><i class="bi bi-save2"></i></button>
                                                    </div>
                                                </form>

                                            </td>

                                <div>
                                    <div class="modal fade" id="hapusjadwal' . $item->id_reservasi . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Reservasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/hapus-reservasi" method="POST">
                                                    ' . csrf_field() . '
                                                    <div class="modal-body">
                                                        <input type="hidden" name="tgl" value="' . $item->tgl_reservasi . '">

                                                        <input type="hidden" name="id" value="' . $item->id_reservasi . '">
                                                        <strong>Apakah anda yakin untuk menghapus?</strong>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="col-4 ">
                                                            <button type="submit" class="btn bg-danger text-white col">Ya yakin</button>
                                                        </div>
                                                        <div class="col-4">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak jadi </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>';
        }
        return response($output);
    }

    public function carireservasipasien()
    {

        if(request('data')==null){
            return;
        }


        $data = reservasi::Where('nama_pasien', 'like', '%' . request('data') . '%')
        ->orWhere('tgl_reservasi', 'like', '%' . request('data') . '%')
        ->orWhere('keluhan', 'like', '%' . request('data') . '%')
        ->get();
        $data = $data->where('user_id', auth::id());



        $no = 0;
        $output = '';
        foreach ($data as $item) {
            $no++;
            if ($item->status_hadir == 0) {
                $status = 'Belum Hadir';
            }
            if ($item->status_hadir == 1) {
                $status = 'Hadir';
            }
            if ($item->status_hadir == 2) {
                $status = 'Tidak Hadir';
            }

            $output = '<tr>
                                            <td>' . $no . '</td>
                                            <td>' . $item->nama_pasien . '</td>
                                            <td>' .  date("d M Y", strtotime($item->tgl_reservasi)) . '</td>
                                            <td>' . $item->keluhan . '</td>
                                            <td>' . $item->no_antrian . '</td>
                                            <td>'.$status.'</td>

                            </tr>';
        }
        return response($output);

    }
    public function kelolareservasi()
    {
        $kelolareservasi = reservasi::orderBy('tgl_reservasi')->orderBy('no_antrian')->paginate(5);
        return view('layouts.kelolareservasi', [
            'reservasi' => $kelolareservasi,
            'title' => self::title . ' Kelola Reservasi'

        ]);
    }

    public function editreservasi(Request $req)
    {
        $reservasi = reservasi::where('id_reservasi', $req['id'])->get();
        if ($reservasi[0]->status_hadir == 1 && $req['status'] == 2) {
            $jadwal =  jadwal::where('tgl_jadwal', $req['tgl'])->get();
            jadwal::where('tgl_jadwal', $req['tgl'])->update(['jumlah_maxpasien' => $jadwal[0]->jumlah_maxpasien + 1]);
        } else if ($reservasi[0]->status_hadir == 2 && $req['status'] == 1) {
            $jadwal =  jadwal::where('tgl_jadwal', $req['tgl'])->get();
            jadwal::where('tgl_jadwal', $req['tgl'])->update(['jumlah_maxpasien' => $jadwal[0]->jumlah_maxpasien - 1]);
        }
        reservasi::where('id_reservasi', $req['id'])->update(['status_hadir' => $req['status']]);
        return back()->withSuccess('Data Berhasil Diubah');
    }

    public function hapusreservasi(Request $req)
    {
        reservasi::where('id_reservasi', $req['id'])->delete();
        reservasi::where('id_reservasi', $req['id'])->update(['status_hadir' => $req['status']]);
        $jadwal = jadwal::where('tgl_jadwal', $req['tgl'])->get();
        jadwal::where('tgl_jadwal', $req['tgl'])->update(['jumlah_maxpasien' => $jadwal[0]->jumlah_maxpasien + 1]);
        return back()->withSuccess('Reservasi berhasil dihapus');
    }
}
