<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersenBagiHasil extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'persen_bagihasil';

    // Primary key yang digunakan
    protected $primaryKey = 'id_persen';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'perusahaan_id',
        'persen',
    ];

    // Relasi ke model Perusahaan
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id', 'id_perusahaan');
    }
}
