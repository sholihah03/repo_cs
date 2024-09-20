<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersenBagiHasil extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tb_persen_bagihasil';

    // Primary key yang digunakan
    protected $primaryKey = 'id_persen';

    // Kolom yang dapat diisi
    protected $fillable = [
        'persen',
    ];
}
