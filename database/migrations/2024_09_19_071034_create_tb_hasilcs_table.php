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
            $table->unsignedBigInteger('cs_id')->nullable(); // Kolom cs_id, nullable
            $table->unsignedBigInteger('hargabotol_id')->nullable();
            $table->integer('cr_new')->nullable();
            $table->decimal('ratio_botol', 10, 2)->nullable();
            $table->decimal('omzet', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('cs_id')
                  ->references('id_cs')
                  ->on('tb_cs')
                  ->onDelete('set null'); // Set null jika cs yang berelasi dihapus

            // Relasi ke tabel tb_hargabotol
            $table->foreign('hargabotol_id')
                    ->references('id_hargabotol')
                    ->on('tb_hargabotol')
                    ->onDelete('set null'); // Set null jika hargabotol dihapus
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
