<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modul;
use App\Models\bank_soal;
use App\Models\pilihan_jawaban;

class GameController extends Controller
{
    // 1. Nampilin daftar Level (Modul C++)
    public function index()
    {
        $moduls = modul::all();
        return response()->json([
            'status' => 'success',
            'data' => $moduls
        ]);
    }

    // 2. Nampilin Soal di Level tertentu beserta Pilihan Jawabannya
    public function mulaiLevel($modul_id)
    {
        // Narik 1 soal random atau soal pertama dari modul tersebut
        $soal = bank_soal::with('pilihan_jawaban')->where('modul_id', $modul_id)->first();

        if (!$soal) {
            return response()->json(['status' => 'error', 'message' => 'Soal belum ada!']);
        }

        return response()->json([
            'status' => 'success', 
            'message' => 'Soal Ready!', 
            'data' => $soal
        ]);
    }

    // 3. Mengecek Jawaban dari User
    public function cekJawaban(Request $request)
    {
        $request->validate([
            'bank_soal_id' => 'required',
            'pilihan_id' => 'required' 
        ]);

        // Cek ke database apakah pilihan ini bener?
        $jawaban = pilihan_jawaban::where('id', $request->pilihan_id)
                                 ->where('bank_soal_id', $request->bank_soal_id)
                                 ->first();

        if ($jawaban && $jawaban->is_benar) {
            // Nanti logika nambah XP atau Streak ditaruh sini
            return response()->json([
                'status' => 'BENAR', 
                'message' => 'GOKILLL, kamu keren banget!'
            ]);
        } else {
            return response()->json([
                'status' => 'SALAH', 
                'message' => 'Yahh salah, coba lagi ya!'
            ]);
        }
    }
}