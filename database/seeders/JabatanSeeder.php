<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_jabatan')->insert([
            ['nama_jabatan' => 'Direktur'],
            ['nama_jabatan' => 'Manager'],
            ['nama_jabatan' => 'Karyawan'],
            ['nama_jabatan' => 'Cs'],
            ['nama_jabatan' => 'Advertiser'],
        ]);
    }
}
