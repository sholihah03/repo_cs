<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapCs extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'rekap_cs';

    // Menentukan kolom primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_rekap_cs';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'cs_id',
        'total_lead',
        'total_closing',
    ];

    // Relasi ke model TbCs
    public function tbCs()
    {
        return $this->belongsTo(Cs::class, 'cs_id', 'id_cs');
    }
}
