<?php

namespace App\Support;

use Illuminate\Support\Facades\Crypt;

/**
 * URL undangan tanpa route() — aman di queue worker / artisan (hindari RouteNotFoundException).
 */
final class UndanganUrl
{
    public static function forPendaftarId(int $id): string
    {
        $encrypted = Crypt::encryptString((string) $id);

        return url('/undangan/'.rawurlencode($encrypted));
    }
}
