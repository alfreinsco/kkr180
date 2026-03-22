<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ingatkan_saya', function (Blueprint $table) {
            $table->integer('umur')->nullable()->after('asal_kampus');
        });

        Schema::table('buku_tamu', function (Blueprint $table) {
            $table->integer('umur')->nullable()->after('asal_kampus');
        });
    }

    public function down(): void
    {
        Schema::table('ingatkan_saya', function (Blueprint $table) {
            $table->dropColumn('umur');
        });

        Schema::table('buku_tamu', function (Blueprint $table) {
            $table->dropColumn('umur');
        });
    }
};
