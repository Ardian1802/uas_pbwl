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
        Schema::create('tb_evaluasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kegiatan');
            $table->unsignedBigInteger('id_peserta');
            $table->string('efektivitas', 50);
            $table->string('aspek_perbaikan', 50);
            $table->string('rekomendasi', 50);
            $table->foreign('id_kegiatan')->references('id')->on('tb_kegiatan');
            $table->foreign('id_peserta')->references('id')->on('tb_peserta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_evaluasi');
    }
};
