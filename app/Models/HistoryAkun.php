<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryAkun extends Model
{
    use HasFactory;

    protected $table = 'tb_historyakun';

    protected $primaryKey = 'id_historyakun';

    protected $fillable = [
        'jabatan_id',
        'nama_lengkap',
        'username',
        'email',
        'no_telepon',
        'profile_karyawan',
        'mulai_bekerja',
        'akhir_bekerja',
        'status',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

}
