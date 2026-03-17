<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SponsorLogoResource;
use App\Models\SponsorLogo;
use Illuminate\Http\JsonResponse;

class SponsorLogoController extends Controller
{
    /**
     * Daftar sponsor logo (urut berdasarkan urutan).
     */
    public function index(): JsonResponse
    {
        $items = SponsorLogo::orderBy('urutan')->orderBy('id')->get();

        return response()->json([
            'data' => SponsorLogoResource::collection($items),
        ]);
    }
}
