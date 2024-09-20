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
        Schema::create('tb_hargabotol', function (Blueprint $table) {
            $table->id('id_hargabotol');
            $table->decimal('harga_botol', 10, 2)->nullable(); // Menyimpan angka hingga 10 digit, 2 digit desimal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_hargabotol');
    }
};
