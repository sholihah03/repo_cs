<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaBotol extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tb_hargabotol';

    // Primary key yang digunakan
    protected $primaryKey = 'id_hargabotol';

    // Kolom yang dapat diisi
    protected $fillable = [
        'harga_botol',
    ];
}
