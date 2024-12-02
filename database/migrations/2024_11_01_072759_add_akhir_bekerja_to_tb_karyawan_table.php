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
            $table->date('akhir_bekerja')->nullable()->after('mulai_bekerja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_karyawan', function (Blueprint $table) {
            $table->dropColumn('akhir_bekerja');
        });
    }
};
