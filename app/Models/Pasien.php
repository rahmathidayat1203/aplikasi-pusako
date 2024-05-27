<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function konsultasi() {
        return $this->hasMany(KonsultasiDokter::class,'id','id_pasien');
    }
}
