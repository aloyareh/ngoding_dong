<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\bahasa;

class BahasaSeeder extends Seeder
{
    public function run(): void
    {
        Bahasa::create([
            'nama_bahasa' => 'C++ Dasar',
            'jumlah_modul' => 3
        ]);
    }
}