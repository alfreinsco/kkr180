<?php

use App\Models\Pengaturan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pengaturan = Pengaturan::aktif();

    return view('welcome', compact('pengaturan'));
});
