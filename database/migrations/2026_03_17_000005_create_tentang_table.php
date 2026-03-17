<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Kolom sesuai desain section Tentang:
     * - judul: Judul section (h3) "Tentang KKR 180°"
     * - deskripsi: Paragraf panjang di atas (text)
     * - gambar: Gambar utama di kiri (img/kkr.png)
     * - subjudul: Tagline di kanan (h4) "Saatnya berubah..."
     * - deskripsi_singkat: Paragraf pendek di kanan (text)
     */
    public function up(): void
    {
        Schema::create('tentang', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('subjudul')->nullable();
            $table->text('deskripsi_singkat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang');
    }
};
