<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LeaderCs extends Authenticatable
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tb_leader_cs';

    // Primary key yang digunakan
    protected $primaryKey = 'id_leader';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
        'email',
        'no_telepon',
        'profile_leader',
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
