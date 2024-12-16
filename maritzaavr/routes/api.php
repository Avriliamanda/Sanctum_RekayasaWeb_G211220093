<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes for authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes with Sanctum middleware
Route::middleware('auth:sanctum')->group(function () {
    // Authentication
    Route::post('/logout', [AuthController::class, 'logout']);

    // Mahasiswa routes
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::get('/mahasiswa/read', [MahasiswaController::class, 'read']);
    Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);

    // Dosen routes
    Route::post('/dosen/create', [DosenController::class, 'create']);
    Route::get('/dosen/read', [DosenController::class, 'read']);
    Route::put('/dosen/update/{id}', [DosenController::class, 'update']);
    Route::delete('/dosen/delete/{id}', [DosenController::class, 'delete']);

    // Makul routes
    Route::post('/makul/create', [MakulController::class, 'create']);
    Route::get('/makul/read', [MakulController::class, 'read']);
    Route::put('/makul/update/{id}', [MakulController::class, 'update']);
    Route::delete('/makul/delete/{id}', [MakulController::class, 'delete']);
});
