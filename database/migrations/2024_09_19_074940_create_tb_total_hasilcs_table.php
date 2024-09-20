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
        Schema::create('tb_total_hasilcs', function (Blueprint $table) {
            $table->id('id_totalhasil');
            $table->unsignedBigInteger('pemasukan_id')->nullable();
            $table->unsignedBigInteger('hasilcs_id')->nullable();
            $table->unsignedBigInteger('bagihasil_id')->nullable();
            $table->integer('total_hasil_lead')->nullable();
            $table->integer('total_hasil_closing')->nullable();
            $table->integer('total_hasil_cr')->nullable();
            $table->decimal('total_hasil_ratio', 10, 2)->nullable();
            $table->decimal('total_hasil_omzet', 10, 2)->nullable();
            $table->decimal('total_hasil_bagi', 10, 2)->nullable();
            $table->decimal('hasil_target', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('pemasukan_id')
                    ->references('id_pemasukan')
                    ->on('tb_pemasukan')
                    ->onDelete('set null');

            $table->foreign('hasilcs_id')
                    ->references('id_hasilcs')
                    ->on('tb_hasilcs')
                    ->onDelete('set null');

            $table->foreign('bagihasil_id')
                    ->references('id_bagihasil')
                    ->on('tb_bagihasil')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_total_hasilcs');
    }
};
