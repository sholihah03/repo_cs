<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Authenticatable
{
    use HasFactory;

    protected $table = 'tb_karyawan';

    // Primary key yang digunakan
    protected $primaryKey = 'id_karyawan';

    // Kolom yang dapat diisi
    protected $fillable = [
        'jabatan_id',
        'nama_lengkap',
        'username',
        'email',
        'no_telepon',
        'profile_karyawan',
        'password',
        'status',
        'mulai_bekerja',
        'akhir_bekerja',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'karyawan_id', 'id_karyawan');
    }
}
