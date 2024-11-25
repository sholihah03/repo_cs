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
        'karyawan_id',
        'total_lead',
        'total_closing',
    ];

    // Relasi ke model TbCs
    public function tbKaryawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id_karyawan');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id_karyawan');
    }

    public function hasilCs()
    {
        return $this->hasMany(HasilCs::class, 'rekap_cs_id'); // sesuaikan dengan foreign key
    }
}
