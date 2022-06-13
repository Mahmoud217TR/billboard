<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'state',
        'user_id',
    ];

    protected $attributes = [
        'state' => 1,
    ];

    public static function getStates(){
        return [
            1 => 'draft',
            2 => 'published',
        ];
    }
    
    // The Accessor & Mutator
    public function state(): Attribute{
        return Attribute::make(
            get: fn ($value) => $this->getStates()[$value],
            set: fn ($value) => array_search($value,$this->getStates()),
        );
    }

    // Relations
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeDraft($query){
        return $query->where('state','1');
    }
    
    public function scopePublished($query){
        return $query->where('state','2');
    }

    public function scopeFeatured($query){
        return $query->where('featured',true);
    }

    public function scopeUnfeatured($query){
        return $query->where('featured',false);
    }

    public function scopeFeaturedFirst($query){
        return $query->orderBy("featured","DESC");
    }

    // Functions
    public function isDraft(){
        return $this->state == 'draft';
    }

    public function isPublished(){
        return $this->state == 'published';
    }
}
