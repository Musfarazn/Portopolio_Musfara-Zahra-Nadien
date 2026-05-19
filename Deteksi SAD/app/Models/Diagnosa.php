<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $fillable = ['user_id', 'hasil', 'keterangan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔹 Relasi ke Jawaban
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
