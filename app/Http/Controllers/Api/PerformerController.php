<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PerformerResource;
use App\Models\Performer;
use Illuminate\Http\JsonResponse;

class PerformerController extends Controller
{
    /**
     * Daftar performer (urut berdasarkan urutan).
     */
    public function index(): JsonResponse
    {
        $performers = Performer::orderBy('urutan')->orderBy('id')->get();

        return response()->json([
            'data' => PerformerResource::collection($performers),
        ]);
    }
}
