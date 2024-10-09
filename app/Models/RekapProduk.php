<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapProduk extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'rekap_produk';

    // Menentukan kolom primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_rekap_produk';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'rekap_cs_id',
        'produk_id',
        'total_produk',
    ];

    // Relasi ke model RekapCs
    public function rekapCs()
    {
        return $this->belongsTo(RekapCs::class, 'rekap_cs_id', 'id_rekap_cs');
    }

    // Relasi ke model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id_produk');
    }
}
