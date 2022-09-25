<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekam_medis extends Model
{
    use HasFactory;

    protected $guarded = ['id_rekam_medis'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
