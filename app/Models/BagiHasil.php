<?php

namespace App\Models;

use App\Models\HasilCs;
use App\Models\Karyawan;
use App\Models\PersenBagiHasil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function karyawan()
    {
        // Menggunakan relasi hasOneThrough untuk menghubungkan BagiHasil ke Karyawan melalui HasilCs dan RekapCs
        return $this->hasOneThrough(Karyawan::class, HasilCs::class, 'hasilcs_id', 'id_karyawan', 'hasilcs_id', 'karyawan_id');
    }

    public function rekapCs()
    {
        return $this->hasOneThrough(RekapCs::class, HasilCs::class, 'hasilcs_id', 'rekap_cs_id');
    }
}
