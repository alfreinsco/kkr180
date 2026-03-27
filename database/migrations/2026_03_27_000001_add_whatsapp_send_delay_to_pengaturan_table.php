<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaturan', function (Blueprint $table) {
            $table->unsignedSmallInteger('whatsapp_send_delay_seconds')
                ->nullable()
                ->after('whatsapp_api_url');
        });
    }

    public function down(): void
    {
        Schema::table('pengaturan', function (Blueprint $table) {
            $table->dropColumn('whatsapp_send_delay_seconds');
        });
    }
};
