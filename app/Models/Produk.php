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
        'cs_id',
        'nama_produk',
        'harga_botol',
    ];

    public function cs()
    {
        return $this->belongsTo(Cs::class, 'cs_id', 'id_cs');
    }
}
