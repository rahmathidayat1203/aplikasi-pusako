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
        Schema::create('konsultasi_dokters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('pasiens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_dokter')->constrained('dokters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pertanyaan_pasien');
            $table->string('jawaban_dokter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi_dokters');
    }
};
