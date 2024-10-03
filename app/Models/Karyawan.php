<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
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
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id_jabatan');
    }
}
