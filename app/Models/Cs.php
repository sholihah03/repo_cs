<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cs extends Authenticatable
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tb_cs';

    // Primary key yang digunakan
    protected $primaryKey = 'id_cs';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_lengkap',
        'username',
        'email',
        'no_telepon',
        'profile_cs',
        'password',
    ];

    // Hidden fields (terutama untuk kolom password)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Mutator untuk menyimpan password yang di-hash
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
