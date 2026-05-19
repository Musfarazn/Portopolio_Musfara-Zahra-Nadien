<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    // Tentukan nama tabel sesuai di database
    protected $table = 'jawaban';

    protected $fillable = ['diagnosa_id', 'gejala_id', 'nilai'];

    // Relasi ke diagnosa
    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }

    // Relasi ke gejala
    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}
