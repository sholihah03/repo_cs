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
        Schema::create('tb_kontakperusahaan', function (Blueprint $table) {
            $table->id('id_kontakperusahaan');
            $table->unsignedBigInteger('perusahaan_id')->nullable(); // Kolom cs_id, nullable
            $table->string('no_telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable(); // Kolom untuk akun Instagram, nullable
            $table->string('wa')->nullable();         // Kolom untuk nomor WhatsApp, nullable
            $table->timestamps();              // Kolom created_at dan updated_at

            // Relasi ke tabel tb_perusahaan
            $table->foreign('perusahaan_id')
                    ->references('id_perusahaan')
                    ->on('tb_perusahaan')
                    ->onDelete('cascade'); // Hapus kontak perusahaan jika perusahaan dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kontakperusahaan');
    }
};
