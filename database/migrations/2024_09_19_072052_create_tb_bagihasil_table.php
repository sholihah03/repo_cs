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
        Schema::create('tb_bagihasil', function (Blueprint $table) {
            $table->id('id_bagihasil');
            $table->unsignedBigInteger('hasilcs_id')->nullable();
            $table->unsignedBigInteger('persen_id')->nullable();
            $table->decimal('bagi_hasil', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('hasilcs_id')
                    ->references('id_hasilcs')
                    ->on('tb_hasilcs')
                    ->onDelete('set null'); // Set null jika hargabotol dihapus

            $table->foreign('persen_id')
                    ->references('id_persen')
                    ->on('tb_persen_bagihasil')
                    ->onDelete('set null'); // Set null jika hargabotol dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bagihasil');
    }
};
