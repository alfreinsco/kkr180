<?php

use App\Models\Pengaturan;
use App\Models\Performer;
use App\Models\ProgramDetail;
use App\Models\SponsorLogo;
use App\Models\Tentang;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pengaturan = Pengaturan::aktif();
    $tentang = Tentang::aktif();
    $performers = Performer::orderBy('urutan')->orderBy('id')->get();
    $programDetails = ProgramDetail::orderBy('urutan')->orderBy('id')->get();
    $sponsorLogos = SponsorLogo::orderBy('urutan')->orderBy('id')->get();

    return view('welcome', compact('pengaturan', 'tentang', 'performers', 'programDetails', 'sponsorLogos'));
});
