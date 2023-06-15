<?php

namespace App\Models;

use App\Models\Expiry;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleRegistration extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parts()
    {
        return $this->hasMany(Part::class, 'vehicle_id');
    }

    public function expiries()
    {
        return $this->hasManyThrough(Expiry::class, Part::class, 'vehicle_id', 'part_id');
    }
}
