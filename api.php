<?php

use App\Http\Controllers\patineteController;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/usePatinetes', [patineteController::class, 'getPatinetes']);