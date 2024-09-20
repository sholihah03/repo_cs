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
        Schema::create('tb_pemasukan', function (Blueprint $table) {
            $table->id('id_pemasukan'); // Primary key
            $table->unsignedBigInteger('cs_id')->nullable(); // Kolom cs_id, nullable
            $table->integer('total_lead')->nullable(); // Kolom untuk total_lead
            $table->integer('total_closing')->nullable(); // Kolom untuk total_closing
            $table->integer('total_botol')->nullable(); // Kolom untuk total_botol
            $table->timestamps(); // Kolom created_at dan updated_at

            // Relasi ke tabel tb_cs
            $table->foreign('cs_id')
                    ->references('id_cs')
                    ->on('tb_cs')
                    ->onDelete('set null'); // Set null jika cs yang berelasi dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pemasukan');
    }
};
