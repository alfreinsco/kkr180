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
        Schema::create('ingatkan_saya', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('pernah_ikut', 10)->default('belum'); // 'sudah' | 'belum'
            $table->string('nama_cgl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingatkan_saya');
    }
};
