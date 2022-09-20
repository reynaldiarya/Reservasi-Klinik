<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reservasi extends Model
{
    use HasFactory;
    protected $guard = ['id_reservasi'];
    protected $fillable = ['nama_pasien', 'user_id', 'tgl_reservasi', 'keluhan', 'no_antrian', "status_hadir"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
