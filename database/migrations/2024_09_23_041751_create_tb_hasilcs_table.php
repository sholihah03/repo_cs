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
        Schema::create('tb_hasilcs', function (Blueprint $table) {
            $table->id('id_hasilcs');
            $table->unsignedBigInteger('rekapcs_id')->nullable();
            $table->unsignedBigInteger('rekap_produk_id')->nullable();
            $table->integer('cr_new')->nullable();
            $table->decimal('ratio_botol', 10, 2)->nullable();
            $table->decimal('omzet', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('rekapcs_id')
                    ->references('id_rekap_cs')
                    ->on('rekap_cs')
                    ->onDelete('set null');

            $table->foreign('rekap_produk_id')
                    ->references('id_rekap_produk')
                    ->on('rekap_produk')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_hasilcs');
    }
};
