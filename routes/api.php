<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\GameController;

// Perhatikan: Nggak perlu nulis '/api/' lagi di depannya, 
// karena kalau ditaruh di file ini, Laravel otomatis nambahin kata '/api/' di URL.
Route::get('/play', [GameController::class, 'index']); 
Route::get('/play/level/{id}', [GameController::class, 'mulaiLevel']); 
Route::post('/play/cek-jawaban', [GameController::class, 'cekJawaban']);

use App\Http\Controllers\AuthController;

// Rute buat Autentikasi API
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);