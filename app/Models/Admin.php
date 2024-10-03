<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'tb_admin';

    // Primary key yang digunakan
    protected $primaryKey = 'id_admin';

    // Kolom yang dapat diisi
    protected $fillable = [
        'username',
        'password',
    ];

    // Hidden fields (terutama untuk kolom password)
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
