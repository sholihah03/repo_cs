<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Perusahaan extends Authenticatable
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tb_perusahaan';

    // Primary key yang digunakan
    protected $primaryKey = 'id_perusahaan';

    // Kolom yang dapat diisi
    protected $fillable = [
        'username',
        'password',
        'nama_perusahaan',
        'nama_direktur',
        'logo'
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
