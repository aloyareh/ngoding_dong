<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahasa extends Model
{
    use HasFactory;

    public function modul() {
        return $this->hasMany(modul::class); 
    }
}
