<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'tb_jabatan';

    // Primary key yang digunakan
    protected $primaryKey = 'id_jabatan';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_jabatan',
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'jabatan_id');
    }
}
