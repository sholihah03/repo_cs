<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapCsTotal extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'rekap_cs_total';

    // Menentukan kolom primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_rekap_cs_total';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'rekap_cs_id',
        'total_botol',
    ];

    // Relasi ke model RekapCs
    public function rekapCs()
    {
        return $this->belongsTo(RekapCs::class, 'rekap_cs_id', 'id_rekap_cs');
    }
}
