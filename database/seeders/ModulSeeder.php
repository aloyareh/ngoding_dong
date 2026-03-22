<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\modul; 

class ModulSeeder extends Seeder
{
    public function run(): void
    {
        $moduls = [
            [
                'bahasa_id' => 1, 
                'nama_modul' => 'Level 1: Hello World!',
                'tahap_modul' => 1,
                'isi_modul' => 'Mengenal struktur dasar program C++ dan cara mencetak teks ke layar.'
            ],
            [
                'bahasa_id' => 1,
                'nama_modul' => 'Level 2: Variabel & Memori',
                'tahap_modul' => 2,
                'isi_modul' => 'Belajar menyimpan data menggunakan variabel seperti int, string, dan float.'
            ],
            [
                'bahasa_id' => 1,
                'nama_modul' => 'Level 3: Percabangan',
                'tahap_modul' => 3,
                'isi_modul' => 'Membuat program mengambil keputusan menggunakan logika If-Else.'
            ],
        ];

        foreach ($moduls as $modul) {
            modul::create($modul);
        }
    }
}