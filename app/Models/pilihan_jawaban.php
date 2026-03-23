<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilihan_jawaban extends Model
{
    use HasFactory;

    public function bank_soal()
    {
        return $this->belongsTo(bank_soal::class);
    }
}
