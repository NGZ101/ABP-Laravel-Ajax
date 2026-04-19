<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;

Route::get('/1', function () {
    return view('welcome');
});

Route::get('/', [profileController::class, 'index']);
Route::get('/api/profile', [profileController::class, 'getData']);