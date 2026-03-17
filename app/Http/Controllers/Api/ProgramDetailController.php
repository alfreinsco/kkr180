<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProgramDetailResource;
use App\Models\ProgramDetail;
use Illuminate\Http\JsonResponse;

class ProgramDetailController extends Controller
{
    /**
     * Daftar program detail (urut berdasarkan urutan).
     */
    public function index(): JsonResponse
    {
        $items = ProgramDetail::orderBy('urutan')->orderBy('id')->get();

        return response()->json([
            'data' => ProgramDetailResource::collection($items),
        ]);
    }
}
