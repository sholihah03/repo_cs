<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTransaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_datatransaksi';

    // Menentukan kolom primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_datatransaksi';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'transaksi_id',
        'karyawan_id',
        'tanggal',
        'jumlah',
        'keterangan',
    ];

    // Relasi ke model TbCs
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id_transaksi');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id_karyawan');
    }
}
