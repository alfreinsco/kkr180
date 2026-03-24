<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use App\Models\IngatkanSaya;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ScanCheckInController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'qr_payload' => 'required|string',
        ], [
            'qr_payload.required' => 'QR payload wajib dikirim.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $payload = (string) $validator->validated()['qr_payload'];

        try {
            $decrypted = Crypt::decryptString($payload);
            $id = (int) $decrypted;
        } catch (DecryptException) {
            return response()->json([
                'success' => false,
                'message' => 'QR tidak valid atau bukan token undangan.',
            ], 422);
        }

        if ($id <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'ID pada QR tidak valid.',
            ], 422);
        }

        $ingatkan = IngatkanSaya::find($id);
        if (! $ingatkan) {
            return response()->json([
                'success' => false,
                'message' => 'Data undangan tidak ditemukan pada Ingatkan Saya.',
            ], 404);
        }

        $bukuTamu = BukuTamu::updateOrCreate(
            ['no_telp' => $ingatkan->no_telp],
            [
                'nama_lengkap' => $ingatkan->nama_lengkap,
                'alamat' => $ingatkan->alamat,
                'asal_kampus' => $ingatkan->asal_kampus,
                'umur' => $ingatkan->umur,
                'pernah_ikut' => $ingatkan->pernah_ikut,
                'nama_cgl' => $ingatkan->pernah_ikut === 'sudah' ? $ingatkan->nama_cgl : null,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => $bukuTamu->nama_lengkap.' berhasil ditambahkan ke buku tamu.',
            'data' => [
                'id' => $bukuTamu->id,
                'nama_lengkap' => $bukuTamu->nama_lengkap,
            ],
        ]);
    }
}

