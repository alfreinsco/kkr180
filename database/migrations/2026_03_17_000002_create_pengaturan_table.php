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
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->unsignedInteger('lebar_logo')->default(150);
            $table->unsignedInteger('tinggi_logo')->default(150);
            $table->date('tanggal_kegiatan')->nullable();
            $table->string('judul_kegiatan')->nullable();
            $table->string('sub_judul_kegiatan')->nullable();
            $table->text('lokasi_kegiatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan');
    }
};
