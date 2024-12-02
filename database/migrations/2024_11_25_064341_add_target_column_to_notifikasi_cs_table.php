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
        Schema::table('notifikasi_cs', function (Blueprint $table) {
            $table->string('target')->nullable(); // Menambahkan kolom 'target' setelah kolom 'cr'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifikasi_cs', function (Blueprint $table) {
            $table->dropColumn('target');
        });
    }
};
