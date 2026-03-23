<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank_soal extends Model
{
    use HasFactory;

    public function modul()
    {
        return $this->belongsTo(modul::class);
    }

    public function pilihan_jawaban()
    {
        return $this->hasMany(pilihan_jawaban::class);
    }
}
