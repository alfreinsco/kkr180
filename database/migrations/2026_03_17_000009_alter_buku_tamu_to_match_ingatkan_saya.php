<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Kolom buku_tamu disamakan dengan ingatkan_saya.
     */
    public function up(): void
    {
        Schema::table('buku_tamu', function (Blueprint $table) {
            $table->dropColumn(['nama', 'email', 'telepon', 'pesan']);
        });
        Schema::table('buku_tamu', function (Blueprint $table) {
            $table->string('nama_lengkap')->after('id');
            $table->string('no_telp')->after('nama_lengkap');
            $table->text('alamat')->after('no_telp');
            $table->string('pernah_ikut', 10)->default('belum')->after('alamat');
            $table->string('nama_cgl')->nullable()->after('pernah_ikut');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buku_tamu', function (Blueprint $table) {
            $table->dropColumn(['nama_lengkap', 'no_telp', 'alamat', 'pernah_ikut', 'nama_cgl']);
        });
        Schema::table('buku_tamu', function (Blueprint $table) {
            $table->string('nama')->after('id');
            $table->string('email')->after('nama');
            $table->string('telepon')->nullable()->after('email');
            $table->text('pesan')->after('telepon');
        });
    }
};
