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
        Schema::create('tb_datatransaksi', function (Blueprint $table) {
            $table->id('id_datatransaksi');
            $table->unsignedBigInteger('transaksi_id')->nullable();
            $table->unsignedBigInteger('karyawan_id')->nullable();
            $table->date('tanggal')->nullable();
            $table->decimal('jumlah', 10, 2)->nullable();
            $table->string(column: 'keterangan')->nullable();
            $table->timestamps();

            $table->foreign('transaksi_id')
                    ->references('id_transaksi')
                    ->on('tb_transaksi')
                    ->onDelete('set null'); // Set null jika hargabotol dihapus

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
        Schema::dropIfExists('tb_datatransaksi');
    }
};
