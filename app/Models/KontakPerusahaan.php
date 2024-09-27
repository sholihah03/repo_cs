<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'tb_kontakperusahaan';

    // Primary key yang digunakan
    protected $primaryKey = 'id_kontakperusahaan';

    // Kolom yang dapat diisi
    protected $fillable = [
        'perusahaan_id',
        'no_telepon',
        'email',
        'instagram',
        'wa',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id', 'id_perusahaan');
    }
}
