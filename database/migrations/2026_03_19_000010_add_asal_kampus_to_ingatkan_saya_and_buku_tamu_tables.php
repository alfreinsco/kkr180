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
        Schema::table('ingatkan_saya', function (Blueprint $table) {
            $table->string('asal_kampus')->nullable()->after('alamat');
        });

        Schema::table('buku_tamu', function (Blueprint $table) {
            $table->string('asal_kampus')->nullable()->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ingatkan_saya', function (Blueprint $table) {
            $table->dropColumn('asal_kampus');
        });

        Schema::table('buku_tamu', function (Blueprint $table) {
            $table->dropColumn('asal_kampus');
        });
    }
};

