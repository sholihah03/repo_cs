<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi';

    // Primary key yang digunakan
    protected $primaryKey = 'id_transaksi';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_transaksi',
        'type',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!in_array($model->type, ['debit', 'kredit'])) {
                throw new \InvalidArgumentException("Tipe transaksi tidak valid.");
            }
        });
    }
}
