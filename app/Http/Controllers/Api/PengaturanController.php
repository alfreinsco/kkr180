<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengaturanResource;
use App\Models\Pengaturan;
use Illuminate\Http\JsonResponse;

class PengaturanController extends Controller
{
    /**
     * Menampilkan pengaturan aktif (untuk landing page / API consumer).
     */
    public function show(): JsonResponse
    {
        $pengaturan = Pengaturan::aktif();

        if (! $pengaturan) {
            return response()->json([
                'data' => null,
                'message' => 'Belum ada pengaturan.',
            ], 200);
        }

        return response()->json([
            'data' => new PengaturanResource($pengaturan),
        ]);
    }
}
