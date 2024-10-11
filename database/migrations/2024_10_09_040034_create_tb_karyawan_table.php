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
        Schema::create('tb_karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('profile_karyawan')->nullable();
            $table->string('password')->nullable();
            $table->enum('status', ['proses', 'aktif', 'tidak aktif'])->default('proses'); // Kolom enum status
            $table->timestamps();

            $table->foreign('jabatan_id')
                    ->references('id_jabatan')
                    ->on('tb_jabatan')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_karyawan');
    }
};
