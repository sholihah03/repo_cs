<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_karyawan')->insert([
            [
                'jabatan_id' => 1, // Direktur
                'email' => 'direktur1@gmail.com',
                'password' => Hash::make('direktur1'), // Password yang di-hash
            ],
            [
                'jabatan_id' => 2, // Manager
                'email' => 'manager1@gmail.com',
                'password' => Hash::make('manager1'),
            ],
            [
                'jabatan_id' => 3, // Karyawan
                'email' => 'karyawan1@gmail.com',
                'password' => Hash::make('karyawan1'),
            ],
            [
                'jabatan_id' => 4, // Cs
                'email' => 'cs1@gmail.com',
                'password' => Hash::make('cs1'),
            ],
            [
                'jabatan_id' => 5, // Advertiser
                'email' => 'advertiser1@gmail.com',
                'password' => Hash::make('advertiser1'),
            ],
        ]);

    }
}
