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
        Schema::create('tb_cs', function (Blueprint $table) {
            $table->id('id_cs'); // Primary key dengan nama id_cs
            $table->string('nama_lengkap')->nullable(); // Kolom untuk nama lengkap CS
            $table->string('username')->unique()->nullable(); // Kolom untuk username, harus unik
            $table->string('email')->unique()->nullable(); // Kolom untuk email, harus unik
            $table->string('no_telepon')->nullable(); // Kolom untuk nomor telepon, nullable
            $table->string('profile_cs')->nullable(); // Kolom untuk profile picture CS, nullable
            $table->string('password'); // Kolom untuk password
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_cs');
    }
};
