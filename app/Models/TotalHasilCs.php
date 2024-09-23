<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalHasilCs extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tb_total_hasilcs';

    // Primary key yang digunakan
    protected $primaryKey = 'id_totalhasil';

    // Kolom yang dapat diisi
    protected $fillable = [
        'pemasukan_id',
        'hasilcs_id',
        'bagihasil_id',
        'total_hasil_lead',
        'total_hasil_closing',
        'total_hasil_cr',
        'total_hasil_ratio',
        'total_hasil_omzet',
        'total_hasil_bagi',
        'hasil_target',
    ];

    // Relasi ke model Pemasukan
    public function pemasukan()
    {
        return $this->belongsTo(Pemasukan::class, 'pemasukan_id', 'id_pemasukan');
    }

    // Relasi ke model HasilCs
    public function hasilCs()
    {
        return $this->belongsTo(HasilCs::class, 'hasilcs_id', 'id_hasilcs');
    }

    // Relasi ke model BagiHasil
    public function bagiHasil()
    {
        return $this->belongsTo(BagiHasil::class, 'bagihasil_id', 'id_bagihasil');
    }
}
