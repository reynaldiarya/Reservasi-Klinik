<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorejadwalRequest;
use App\Http\Requests\UpdatejadwalRequest;

class JadwalController extends Controller
{
    const title = 'Jadwal - dr. Reynaldi';

    public function kelolajadwal()
    {
        $jadwal = jadwal::orderby('tgl_jadwal', 'desc')->paginate(5);
        return view('layouts.kelolajadwal', [
            'title' => self::title . ' Kelola Jadwal',
            'jadwal' => $jadwal
        ]);
    }
    public function tambahjadwal(Request $req)
    {
        $req->validate(['tgl_jadwal' => 'unique:jadwals']);
        $jadwal = [
            'tgl_jadwal' => $req['tgl_jadwal'],
            'jam_masuk' => $req['jam_masuk'],
            'jam_pulang' => $req['jam_pulang'],
            'jumlah_maxpasien' => $req['max_pasien']
        ];
        jadwal::create($jadwal);
        return back()->with('success', 'Jadwal berhasil ditambahkan');

    }
    public function carijadwal()
    {
    if(request('cari-jadwal')==null){
        return;
    }
        $jadwal = jadwal::where('tgl_jadwal', 'like', '%' . request('cari-jadwal') . '%')
            ->orWhere('jam_masuk', 'Like', '%' . request('cari-jadwal') . '%')
            ->orWhere('jam_pulang', 'Like', '%' . request('cari-jadwal') . '%')
            ->orWhere('jumlah_maxpasien', 'Like', '%' . request('cari-jadwal') . '%')->get();
        $no = 0;
        $output = '';
        foreach ($jadwal as $item) {
            $no++;
            if ($item->status_masuk == 0) {
                $status = 'Hadir';
            }
            if ($item->status_masuk == 1) {
                $status = 'Tidak Hadir';
            }

            $output.='<tr>
                            <td>'.$no. '</td>
                            <td>'.  date("d M Y", strtotime($item->tgl_jadwal)). '</td>
                            <td>'.$item->jam_masuk.'</td>
                            <td>'. $item->jam_pulang.'</td>
                            <td>'. $status .'</td>
                            <td>'. $item->jumlah_maxpasien .'</td>
                            <td>
                                <button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#editjadwal' . $item->id_jadwal . '" ><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#hapusjadwal' . $item->id_jadwal . '" ><i class="fa-solid fa-trash-can"></i></button>
                           </td>
                           <div>
                        <div class="modal fade" id="hapusjadwal' . $item->id_jadwal . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/hapus-jadwal" method="POST">' .
                csrf_field() . '
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="' . $item->id_jadwal . '">
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
                        <div>
                        <div class="modal fade" id="editjadwal' . $item->id_jadwal . '" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="editjadwal' . $item->id_jadwal . '">Edit Jadwal</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="/edit-jadwal" method="post">
                                    ' . csrf_field() . '
                                    <input type="hidden" name="id" value="' . $item->id_jadwal . '">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="tgl">Tanggal<span class="small text-danger">*</span></label>
                                                <input type="date" required id="tgl" class="form-control" name="tgl_jadwal"  value="' . $item->tgl_jadwal . '">
                                            </div>
                                        </div>
                                        <div class="col-lg-5 ">
                                            <div class="form-group">
                                                <label class="form-control-label" for="status">Status Masuk<span class="small text-danger">*</span></label>
                                                <select  name ="status" class="form-select" aria-label="Default select example">
                                                    <option value="' . $item->status_masuk . '" selected>' . $status . '</option>
                                                    <option value="0">Hadir</option>
                                                    <option value="1">Tidak Hadir</option>
                                                  </select>
                                                </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="jam_masuk">Jam Masuk<span class="small text-danger">*</span></label>
                                                    <input type="time" id="jam_masuk" required class="form-control" name="jam_masuk" value="' . $item->jam_masuk . '">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="jam_pulang">Jam Pulang<span class="small text-danger">*</span></label>
                                                    <input type="time" id="jam_pulang" required class="form-control" name="jam_pulang"  value="' . $item->jam_pulang . '">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="Max Pasien">Max Pasien<span class="small text-danger">*</span></label>
                                                    <input type="number" min="0" id="Max Pasien" required class="form-control" name="jumlah_maxpasien" value="' . $item->jumlah_maxpasien . '">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-7 col-md-5 mt-3">
                                        <button type="submit" class="btn bg-primary text-white col">Simpan Perubahan</button>
                                    </div>

                                </form>

                            </div>

                                </div>

                              </div>
                            </div>
                          </div>

                        </tr>




                        </tr>';
        }
        return response($output);
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
        return back()->withSuccess('Jadwal berhasil dihapus');

    }
    public function editjadwal(Request $Req)
    {

        jadwal::where('id_jadwal', $Req['id'])->update([
                'tgl_jadwal' => $Req['tgl_jadwal'],
                'jam_masuk' => $Req['jam_masuk'],
                'jam_pulang' => $Req['jam_pulang'],
                'status_masuk' => $Req['status'],
                'jumlah_maxpasien' => $Req['jumlah_maxpasien']
            ]);

        return back()->withSuccess('Jadwal berhasil diperbarui');
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
