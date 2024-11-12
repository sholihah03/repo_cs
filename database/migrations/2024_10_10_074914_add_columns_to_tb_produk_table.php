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
        Schema::table('tb_produk', function (Blueprint $table) {
            $table->string('gambar_produk')->nullable(); // Tambahkan kolom gambar_produk
            $table->integer('stok')->nullable(); // Tambahkan kolom stok
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_produk', function (Blueprint $table) {
            $table->dropColumn('gambar_produk'); // Hapus kolom gambar_produk
            $table->dropColumn('stok'); // Hapus kolom stok
        });
    }
};
