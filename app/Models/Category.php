<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory, Searchable;

    public function toSearchableArray(){
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    protected $fillable = [
        'name',
        'description',
    ];

    // Relations
    public function advertisements(){
        return $this->hasMany(Advertisement::class);
    }

    // Functions 
    public function getDescriptionSummary(){
        $len = strlen($this->description);
        if($len > 50){
            return substr($this->description,50,$len);
        }
        return $this->description;
    }
}
