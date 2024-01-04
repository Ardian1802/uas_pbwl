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
        Schema::create('tb_peserta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kegiatan');
            $table->string('nama_peserta', 100);
            $table->enum('peran', ['Panitia', 'Peserta']);
            $table->foreign('id_kegiatan')->references('id')->on('tb_kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_peserta');
    }
};
