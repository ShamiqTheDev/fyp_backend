<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expiry extends Model
{
    use HasFactory;

    // protected $protected = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['distance'];
}
