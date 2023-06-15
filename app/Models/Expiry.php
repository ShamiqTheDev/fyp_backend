<?php

namespace App\Models;

use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expiry extends Model
{
    use HasFactory;

    // protected $protected = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['distance'];

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }
}
