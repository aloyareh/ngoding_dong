<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank_soal extends Model
{
    use HasFactory;

    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }

    public function pilihanJawaban()
    {
        return $this->hasMany(PilihanJawaban::class);
    }
}
