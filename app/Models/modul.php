<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modul extends Model
{
    use HasFactory;

    public function bahasa()
    {
        return $this->belongsTo(Bahasa::class);
    }

    public function bankSoal()
    {
        return $this->hasMany(BankSoal::class);
    }

    public function userProgres()
    {
        return $this->hasMany(UserProgres::class);
    }
}
