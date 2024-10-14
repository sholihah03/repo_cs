<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatPerusahaan extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tb_alamatperusahaan';

    // Primary key yang digunakan
    protected $primaryKey = 'id_alamatperusahaan';

    // Kolom yang dapat diisi
    protected $fillable = [
        'perusahaan_id',
        'detail_lainnya',
        'rt',
        'rw',
        'kelurahan',
        'kabupaten',
        'kecamatan',
        'provinsi',
        'kode_pos',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id', 'id_perusahaan');
    }
}
