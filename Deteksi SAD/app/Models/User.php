<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Ubah atribut yang bisa diisi massal
    protected $fillable = [
        'name',
        'password',
        'nama',
        'umur',
        'prodi',
        'role',
    ];

    protected $hidden = ['password','remember_token'];

    public function diagnosas()
    {
        return $this->hasMany(Diagnosa::class);
    }
}
