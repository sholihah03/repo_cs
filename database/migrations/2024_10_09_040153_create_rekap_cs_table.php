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
        Schema::create('rekap_cs', function (Blueprint $table) {
            $table->id('id_rekap_cs');
            $table->unsignedBigInteger('karyawan_id')->nullable(); // Kolom cs_id, nullable
            $table->integer('total_lead')->nullable(); // Kolom untuk total_lead
            $table->integer('total_closing')->nullable(); // Kolom untuk total_closing
            $table->timestamps();

            // Relasi ke tabel tb_cs
            $table->foreign('karyawan_id')
                    ->references('id_karyawan')
                    ->on('tb_karyawan')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_cs');
    }
};
