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
        Schema::create('rekap_produk', function (Blueprint $table) {
            $table->id('id_rekap_produk');
            $table->unsignedBigInteger('rekap_cs_id')->nullable(); // Kolom cs_id, nullable
            $table->unsignedBigInteger('produk_id')->nullable(); // Kolom cs_id, nullable
            $table->integer('total_produk')->nullable(); // Kolom untuk total_botol
            $table->timestamps();

            // Relasi
            $table->foreign('rekap_cs_id')
                    ->references('id_rekap_cs')
                    ->on('rekap_cs')
                    ->onDelete('set null');

            $table->foreign('produk_id')
                    ->references('id_produk')
                    ->on('tb_produk')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_produk');
    }
};
