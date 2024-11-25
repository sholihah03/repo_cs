<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiCs extends Model
{
    use HasFactory;

    protected $table = 'notifikasi_cs';


    protected $primaryKey = 'id_notifikasi';

    protected $fillable = [
        'id_karyawan',
        'target',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }
}