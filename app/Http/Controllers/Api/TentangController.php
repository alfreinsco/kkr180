<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TentangResource;
use App\Models\Tentang;
use Illuminate\Http\JsonResponse;

class TentangController extends Controller
{
    /**
     * Menampilkan data tentang aktif.
     */
    public function show(): JsonResponse
    {
        $tentang = Tentang::aktif();

        if (! $tentang) {
            return response()->json([
                'data' => null,
                'message' => 'Belum ada data tentang.',
            ], 200);
        }

        return response()->json([
            'data' => new TentangResource($tentang),
        ]);
    }
}
