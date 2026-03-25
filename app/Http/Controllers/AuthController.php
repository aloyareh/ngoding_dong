<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Fungsi buat Pemain Baru (Register)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = user::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'xp' => 0 // Awal main dapet 0 XP
        ]);

        // Bikin tiket masuk (Token)
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Akun berhasil dibuat.',
            'user' => $user,
            'token' => $token
        ]);
    }

    // 2. Fungsi buat Pemain Lama (Login)
    public function login(Request $request)
    {
        // 1. Validasi: Kita ganti kuncinya jadi 'login' biar universal
        $request->validate([
            'login' => 'required', // Bisa diisi email ATAU username
            'password' => 'required',
        ]);

        // 2. Cari user: Cek apakah inputan 'login' itu ada di kolom email ATAU username
        $user = user::where('email', $request->login)
                    ->orWhere('username', $request->login)
                    ->first();

        // 3. Cek kecocokan: Kalau user nggak ketemu ATAU password salah
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email/Username atau Password salah!'
            ], 401);
        }

        // 4. Kalau lolos, cetak tiket/token baru
        $token = $user->createToken('auth_token')->plainTextToken;

        // 5. Kasih balasan sukses
        return response()->json([
            'message' => 'Login berhasil!',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        // Cari token yang lagi dipake user saat ini, terus hapus (revoke) dari database
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Berhasil logout. Sampai jumpa lagi.'
        ], 200);
    }
}