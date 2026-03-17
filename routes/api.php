<?php

use App\Http\Controllers\Api\IngatkanSayaController;
use Illuminate\Support\Facades\Route;

Route::post('/ingatkan-saya', [IngatkanSayaController::class, 'store']);
