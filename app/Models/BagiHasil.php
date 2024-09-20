<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagiHasil extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tb_bagihasil';

    // Primary key yang digunakan
    protected $primaryKey = 'id_bagihasil';

    // Kolom yang dapat diisi
    protected $fillable = [
        'hasilcs_id',
        'persen_id',
        'bagi_hasil',
    ];

    // Relasi ke model HasilCs
    public function hasilCs()
    {
        return $this->belongsTo(HasilCs::class, 'hasilcs_id', 'id_hasilcs');
    }

    // Relasi ke model PersenBagihasil
    public function persen()
    {
        return $this->belongsTo(PersenBagihasil::class, 'persen_id', 'id_persen');
    }
}
