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
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->unsignedBigInteger('karyawan_id')->nullable(); // Kolom cs_id, nullable
            $table->string('nama_produk');
            $table->decimal('harga_botol', 10, 2)->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('tb_produk');
    }
};
