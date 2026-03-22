<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\IngatkanSayaResource;
use App\Models\IngatkanSaya;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngatkanSayaController extends Controller
{
    /**
     * Store a newly created resource (pendaftaran ingatkan saya).
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'no_telp' => 'required|string|regex:/^[0-9+\s\-()]+$/|max:20',
            'alamat' => 'required|string',
            'asal_kampus' => 'nullable|string|max:255',
            'umur' => 'nullable|integer|min:0|max:120',
            'pernah_ikut' => 'required|in:sudah,belum',
            'nama_cgl' => 'nullable|required_if:pernah_ikut,sudah|string|max:255',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.regex' => 'Nomor telepon hanya boleh berisi angka dan format nomor (+, spasi, strip).',
            'alamat.required' => 'Alamat wajib diisi.',
            'pernah_ikut.required' => 'Pilih apakah sudah pernah mengikuti CG.',
            'pernah_ikut.in' => 'Pilihan tidak valid.',
            'nama_cgl.required_if' => 'Nama CGL wajib diisi jika sudah pernah mengikuti CG.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();
        if (($data['pernah_ikut'] ?? '') !== 'sudah') {
            $data['nama_cgl'] = null;
        }

        $ingatkan = IngatkanSaya::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih! Kami akan mengingatkan Anda untuk KKR 180°.',
            'data' => new IngatkanSayaResource($ingatkan),
        ], 201);
    }
}
