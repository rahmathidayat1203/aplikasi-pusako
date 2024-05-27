<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsultasiDokter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pasien() {
        return $this->belongsTo(Pasien::class,'id','id_pasien');
    }

    public function dokter() {
        return $this->belongsTo(Dokter::class,'id','id_dokter');
    }
}
