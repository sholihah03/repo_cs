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
        Schema::table('tb_perusahaan', function (Blueprint $table) {
            // Menambahkan kolom username dan password setelah kolom id_perusahaan
            $table->string('username')->unique()->nullable()->after('id_perusahaan');
            $table->string('password')->nullable()->after('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_perusahaan', function (Blueprint $table) {
            // Menghapus kolom username dan password
            $table->dropColumn('username');
            $table->dropColumn('password');
        });
    }
};
