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
        Schema::table('notifikasi_cs', function (Blueprint $table) {
            // Adding the is_read column after the 'target' column
            $table->tinyInteger('is_read')->default(0)->after('target')->nullable(false);

            // Adding the id_karyawan column after the 'id' column
            $table->bigInteger('id_karyawan')->after('id');

            // Adding the id_hasilcs column after the 'id_karyawan' column
            $table->bigInteger('id_hasilcs')->after('id_karyawan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifikasi_cs', function (Blueprint $table) {
            // Dropping the columns in reverse order to avoid issues
            $table->dropColumn(['is_read', 'id_karyawan', 'id_hasilcs']);
        });
    }
};
