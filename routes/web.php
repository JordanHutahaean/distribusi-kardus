<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistribusiController;

Route::get('/', [DistribusiController::class, 'index']);

Route::post('/hitung', [DistribusiController::class, 'hitung'])
    ->name('hitung');