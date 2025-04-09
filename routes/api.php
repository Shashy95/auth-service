<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login', [LoginController::class, 'login']); 
Route::post('/register', [RegisterController::class, 'register']); 

Route::get('/test', function () {
    return response()->json(['message' => 'This is a test message']);
});

