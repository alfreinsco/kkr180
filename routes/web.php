<?php

use App\Models\Pengaturan;
use App\Models\Performer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pengaturan = Pengaturan::aktif();
    $performers = Performer::orderBy('urutan')->orderBy('id')->get();

    return view('welcome', compact('pengaturan', 'performers'));
});
