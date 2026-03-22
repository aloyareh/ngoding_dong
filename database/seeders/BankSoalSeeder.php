<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\bank_soal;
use App\Models\pilihan_jawaban;

class BankSoalSeeder extends Seeder
{
    public function run(): void
    {
        // --- SOAL LEVEL 1 ---
        $soal1 = bank_soal::create([
            'modul_id' => 1, 
            'soal' => 'Perintah apa yang digunakan untuk mencetak output ke layar di C++?',
            'jawaban' => 'cout' 
        ]);

        pilihan_jawaban::insert([
            ['bank_soal_id' => $soal1->id, 'text_jawaban' => 'print()', 'is_benar' => false],
            ['bank_soal_id' => $soal1->id, 'text_jawaban' => 'cout', 'is_benar' => true],
            ['bank_soal_id' => $soal1->id, 'text_jawaban' => 'echo', 'is_benar' => false],
        ]);

        // --- SOAL LEVEL 2 ---
        $soal2 = bank_soal::create([
            'modul_id' => 2,
            'soal' => 'Tipe data apa yang tepat untuk menyimpan bilangan bulat seperti angka 10?',
            'jawaban' => 'int'
        ]);

        pilihan_jawaban::insert([
            ['bank_soal_id' => $soal2->id, 'text_jawaban' => 'string', 'is_benar' => false],
            ['bank_soal_id' => $soal2->id, 'text_jawaban' => 'float', 'is_benar' => false],
            ['bank_soal_id' => $soal2->id, 'text_jawaban' => 'int', 'is_benar' => true],
        ]);
        
        // --- SOAL LEVEL 3 ---
        $soal3 = bank_soal::create([
            'modul_id' => 3,
            'soal' => 'Simbol apa yang Wajib digunakan untuk mengakhiri setiap baris pernyataan di C++?',
            'jawaban' => '; (Titik koma)'
        ]);

        pilihan_jawaban::insert([
            ['bank_soal_id' => $soal3->id, 'text_jawaban' => ': (Titik dua)', 'is_benar' => false],
            ['bank_soal_id' => $soal3->id, 'text_jawaban' => '; (Titik koma)', 'is_benar' => true],
            ['bank_soal_id' => $soal3->id, 'text_jawaban' => '. (Titik)', 'is_benar' => false],
        ]);
    }
}