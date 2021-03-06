<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Advertisement extends Model
{
    use HasFactory, Searchable;

    public function toSearchableArray(){
        return [
            'title' => $this->title, 
            'description' => $this->description,
            'author' => $this->user->name,
            'category.name' => $this->category->name,
            'category.description' => $this->category->description,
        ];
    }

    public function shouldBeSearchable(){
        return $this->isPublished();
    }

    protected $fillable = [
        'title',
        'description',
        'state',
        'user_id',
        'category_id',
        'featured',
    ];

    protected $attributes = [
        'state' => 1,
        'featured' => false,
        'category_id' => null,
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

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
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

    public function scopeCategorized($query){
        return $query->whereNotNull("category_id");
    }

    public function scopeUncategorized($query){
        return $query->whereNull("category_id");
    }

    public function scopeInCategory($query, $category){
        return $query->where("category_id","=",$category->id);
    }

    // Functions
    public function isDraft(){
        return $this->state == 'draft';
    }

    public function isPublished(){
        return $this->state == 'published';
    }

    public function getCategory(){
        if($this->category){
            return $this->category->name;
        }
        return "Uncategorized";
    }

    public function isCategorized(){
        return $this->category!=null;
    }
}
