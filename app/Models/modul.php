<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modul extends Model
{
    use HasFactory;

    public function bahasa()
    {
        return $this->belongsTo(bahasa::class);
    }

    public function bank_soal()
    {
        return $this->hasMany(bank_soal::class);
    }

    public function user_proges()
    {
        return $this->hasMany(user_proges::class);
    }
}
