<?php

use App\Http\Controllers\Api\IngatkanSayaController;
use App\Http\Controllers\Api\PengaturanController;
use App\Http\Controllers\Api\PerformerController;
use App\Http\Controllers\Api\ProgramDetailController;
use App\Http\Controllers\Api\TentangController;
use Illuminate\Support\Facades\Route;

Route::get('/pengaturan', [PengaturanController::class, 'show']);
Route::get('/tentang', [TentangController::class, 'show']);
Route::get('/performers', [PerformerController::class, 'index']);
Route::get('/program-details', [ProgramDetailController::class, 'index']);
Route::post('/ingatkan-saya', [IngatkanSayaController::class, 'store']);
