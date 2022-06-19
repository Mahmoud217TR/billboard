<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
    ];

    public function toSearchableArray(){
        return [
            'name' => $this->name, 
        ];
    }

    // Relations
    public function advertisements(){
        return $this->belongsToMany(Advertisement::class);
    }

    // Accessor & Mutator
    public function name(): Attribute{
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => Tag::formatTagName($value),
        );
    }

    // Functions 
    public function formatTagName($name){
        return strtolower(str_replace(" ","_",$name));
    }
}
