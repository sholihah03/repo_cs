<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tb_karyawan', function (Blueprint $table) {
            $table->date('mulai_bekerja')->nullable()->after('status'); // Menambahkan setelah kolom status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_karyawan', function (Blueprint $table) {
            $table->dropColumn('mulai_bekerja');
        });
    }
};
