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
        Schema::create('persen_target', function (Blueprint $table) {
            $table->id('id_persen_target');
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->decimal('persen_target', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('perusahaan_id')
                    ->references('id_perusahaan')
                    ->on('tb_perusahaan')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persen_target');
    }
};
