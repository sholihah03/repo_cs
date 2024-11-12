<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'tb_produk';

    // Primary key yang digunakan
    protected $primaryKey = 'id_produk';

    // Kolom yang dapat diisi
    protected $fillable = [
        'karyawan_id',
        'gambar_produk',
        'nama_produk',
        'stok',
        'harga_botol',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id_karyawan');
    }
}
