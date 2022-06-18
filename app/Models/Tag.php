<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Relations
    public function advertisements(){
        return $this->belongsToMany(Advertisement::class);
    }
}
