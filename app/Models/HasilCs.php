<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilCs extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tb_hasilcs';

    // Primary key yang digunakan
    protected $primaryKey = 'id_hasilcs';

    // Kolom yang dapat diisi
    protected $fillable = [
        'cs_id',
        'hargabotol_id',
        'cr_new',
        'ratio_botol',
        'omzet',
    ];

    // Relasi ke model CS
    public function cs()
    {
        return $this->belongsTo(Cs::class, 'cs_id', 'id_cs');
    }

    // Relasi ke model HargaBotol
    public function hargabotol()
    {
        return $this->belongsTo(HargaBotol::class, 'hargabotol_id', 'id_hargabotol');
    }
}
