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
        Schema::create('tb_leader_cs', function (Blueprint $table) {
            $table->id('id_leader');
            $table->string('nama_lengkap')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password');
            $table->string('email')->unique()->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('profile_leader')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_leader_cs');
    }
};
