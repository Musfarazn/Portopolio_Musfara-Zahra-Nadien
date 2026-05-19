<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();

            // 🧠 Gejala DASS-Anxiety
            $table->string('G01');  // Saya merasa mulut saya kering
            $table->string('G02');  // Saya merasa sulit bernapas
            $table->string('G03');  // Saya merasa gemetar (tremor)
            $table->string('G04');  // Saya merasa gugup
            $table->string('G05');  // Saya takut tanpa alasan jelas
            $table->string('G06');  // Saya merasa lemas/tidak bertenaga
            $table->string('G07');  // Saya merasa panik atau ketakutan

            // 🔹 Output hasil fuzzy
            $table->string('hasil'); // Normal, Ringan, Sedang, Berat, Sangat Berat

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
