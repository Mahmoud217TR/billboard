<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'picture',
        'phone',
        'address',
    ];

    protected $attributes = [
        'picture' => null,
        'phone' => null,
        'address' => null,
    ];

    // Relations 
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Functions
    public function avatar(){
        return $this->picture??asset('images/avatar.png');
    }
}
