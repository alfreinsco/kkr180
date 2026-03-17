<?php

use App\Http\Controllers\Api\IngatkanSayaController;
use App\Http\Controllers\Api\PengaturanController;
use Illuminate\Support\Facades\Route;

Route::get('/pengaturan', [PengaturanController::class, 'show']);
Route::post('/ingatkan-saya', [IngatkanSayaController::class, 'store']);
