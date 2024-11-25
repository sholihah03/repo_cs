<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilCs extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'tb_hasilcs';

    // Menentukan kolom primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_hasilcs';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'rekapcs_id',
        'rekap_produk_id',
        'cr_new',
        'ratio_botol',
        'omzet',
    ];

    // Relasi ke model RekapCs
    public function rekapCs()
    {
        return $this->belongsTo(RekapCs::class, 'rekapcs_id', 'id_rekap_cs');
    }

    public function bagihasil()
    {
        return $this->hasMany(BagiHasil::class, 'hasilcs_id', 'id_hasilcs');
    }


    // Relasi ke model RekapProduk
    public function rekapProduk()
    {
        return $this->belongsTo(RekapProduk::class, 'rekap_produk_id', 'id_rekap_produk');
    }
}
