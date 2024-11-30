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
        'id_hasilcs',
        'target',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function hasilcs()
    {
        return $this->belongsTo(HasilCs::class, 'id_hasilcs', 'id_hasilcs');
    }

    public function scopeExpired($query)
    {
        return $query->where('created_at', '<', now()->subDay());
    }
}