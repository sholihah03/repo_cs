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
        Schema::create('tb_alamatperusahaan', function (Blueprint $table) {
            $table->id('id_alamatperusahaan'); // Primary key dengan nama id_alamatperusahaan
            $table->unsignedBigInteger('perusahaan_id')->nullable(); // Kolom cs_id, nullable
            $table->string('detail_lainnya')->nullable();      // Kolom untuk nama jalan
            $table->string('rt')->nullable();  // Kolom untuk RT, nullable
            $table->string('rw')->nullable();  // Kolom untuk RW, nullable
            $table->string('kelurahan')->nullable(); // Kolom untuk kelurahan, nullable
            $table->string('kabupaten')->nullable();        // Kolom untuk kabupaten
            $table->string('kecamatan')->nullable();        // Kolom untuk kecamatan
            $table->string('provinsi')->nullable();         // Kolom untuk provinsi
            $table->string('kode_pos')->nullable();
            $table->timestamps();              // Kolom created_at dan updated_at

            // Relasi ke tabel tb_perusahaan
            $table->foreign('perusahaan_id')
                    ->references('id_perusahaan')
                    ->on('tb_perusahaan')
                    ->onDelete('set null'); // Set null jika perusahaan dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_alamatperusahaan');
    }
};
