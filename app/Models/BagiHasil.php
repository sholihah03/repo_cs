<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagiHasil extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'tb_bagihasil';

    // Menentukan kolom primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_bagihasil';

    // Kolom-kolom yang dapat diisi (mass assignable)
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

    // Relasi ke model PersenBagiHasil
    public function persenBagiHasil()
    {
        return $this->belongsTo(PersenBagiHasil::class, 'persen_id', 'id_persen');
    }
}
