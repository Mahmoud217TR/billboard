<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'role' => 1,
    ];

    public static function getRoles(){
        return [
            1 => 'user',
            2 => 'admin',
        ];
    }

    public function role(): Attribute{
        return Attribute::make(
            get: fn($value) => $this->getRoles()[$value],
            set: fn($value) => array_search($value,$this->getRoles()),
        );
    }

    // Relations
    public function advertisements(){
        return $this->hasMany(Advertisement::class);
    }

    // Scopes
    public function scopeUser($query){
        return $query->where('role','1');
    }

    public function scopeAdmin($query){
        return $query->where('role','2');
    }

    // Functions
    public function isOwner($object){
        return $this->id == $object->user_id;
    }

    public function isAdmin(){
        return $this->role == 'admin';
    }
}
