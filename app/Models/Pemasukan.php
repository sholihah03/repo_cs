<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tb_pemasukan';

    // Primary key yang digunakan
    protected $primaryKey = 'id_pemasukan';

    // Kolom yang dapat diisi
    protected $fillable = [
        'cs_id',
        'total_lead',
        'total_closing',
        'total_botol',
    ];

    // Relasi ke model CS
    public function cs()
    {
        return $this->belongsTo(Cs::class, 'cs_id', 'id_cs');
    }
}
