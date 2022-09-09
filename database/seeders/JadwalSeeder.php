<?php

namespace Database\Seeders;

use App\Models\jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        jadwal::create([
            'id_jadwal' => "",
        'tgl_jadwal'=> "2022-01-10",
        'jam_masuk' =>date('y-m-d'),

        
        ]);
    }
}
