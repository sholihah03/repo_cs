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
        Schema::table('tb_hasilcs', function (Blueprint $table) {
            $table->decimal('cr_new', 10, 2)->nullable()->change(); // Ubah tipe data menjadi decimal(8,2)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_hasilcs', function (Blueprint $table) {
            $table->integer('cr_new')->nullable()->change(); // Kembalikan tipe data menjadi integer
        });
    }
};
