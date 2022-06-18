<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use HasFactory, Searchable;

    public function toSearchableArray(){
        return [
            'name' => $this->name, 
        ];
    }

    // Relations
    public function advertisements(){
        return $this->belongsToMany(Advertisement::class);
    }
}
