<?php

namespace App\Http\Controllers;

use App\Models\IngatkanSaya;
use App\Models\Pengaturan;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UndanganController extends Controller
{
    public function show(Request $request, string $encryptedId): View
    {
        try {
            $decrypted = Crypt::decryptString($encryptedId);
            $id = (int) $decrypted;
        } catch (DecryptException) {
            abort(404);
        }

        if ($id <= 0) {
            abort(404);
        }

        $tamu = IngatkanSaya::findOrFail($id);
        $pengaturan = Pengaturan::aktif();

        return view('undangan', [
            'tamu' => $tamu,
            'pengaturan' => $pengaturan,
            'encryptedId' => $encryptedId,
            // QR hanya berisi teks id terenkripsi dari tabel ingatkan_saya.
            'qrPayload' => $encryptedId,
        ]);
    }
}

