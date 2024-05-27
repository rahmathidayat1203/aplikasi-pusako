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
        Schema::create('antrean', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('pasiens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_dokter')->constrained('dokters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nomor_antrean');
            $table->string('waktu_antrean');
            $table->string('waktu_panggilan');
            $table->string('waktu_keluar');
            $table->string('rating');
            $table->string('komentar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrean');
    }
};
