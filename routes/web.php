<?php

use App\Http\Controllers\UndanganController;
use App\Models\Pengaturan;
use App\Models\Performer;
use App\Models\ProgramDetail;
use App\Models\SponsorLogo;
use App\Models\Tentang;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pengaturan = Pengaturan::aktif();
    $tentang = Tentang::aktif();
    $performers = Performer::orderBy('urutan')->orderBy('id')->get();
    $programDetails = ProgramDetail::orderBy('urutan')->orderBy('id')->get();
    $sponsorLogos = SponsorLogo::orderBy('urutan')->orderBy('id')->get();

    return view('welcome', compact('pengaturan', 'tentang', 'performers', 'programDetails', 'sponsorLogos'));
});

Route::get('/register', function () {
    $pengaturan = Pengaturan::aktif();

    return view('register', compact('pengaturan'));
});

Route::get('/scan', function (Request $request) {
    // $ua = strtolower((string) $request->userAgent());
    // $isMobile = preg_match('/iphone|ipod|android.*mobile|android.*(?!tablet)|windows phone|blackberry|bb10|mobile/i', $ua) === 1;

    // if (! $isMobile) {
    //     abort(404);
    // }

    return view('scan');
});
Route::get('/test', function (Request $request) {
    return view('test');
});

Route::get('/undangan/{encryptedId}', [UndanganController::class, 'show'])
    ->name('undangan.show');

// Opsional helper untuk generate URL undangan terenkripsi dari ID.
Route::get('/undangan-link/{id}', function (int $id) {
    return redirect()->route('undangan.show', [
        'encryptedId' => Crypt::encryptString((string) $id),
    ]);
})->whereNumber('id');
