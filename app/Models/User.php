<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserDetails;
use App\Models\Package;
use App\Models\Registeration;
use App\Models\Fee;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // public function detail()
    // {
    //     return $this->hasOne(UserDetails::class);
    // }

    // public function details()
    // {
    //     return $this->hasMany(UserDetails::class);
    // }

    // public function registeration()
    // {
    //     return $this->hasOne(Registeration::class);
    // }

    // public function fees()
    // {
    //     return $this->hasMany(Fee::class);
    // }
}

