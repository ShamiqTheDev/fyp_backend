<?php

namespace App\Models;

use App\Models\Expiry;
use App\Models\VehicleRegistration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    public function vehicleRegistration()
    {
        return $this->belongsTo(VehicleRegistration::class, 'vehicle_id');
    }

    public function expiries()
    {
        return $this->hasMany(Expiry::class, 'part_id');
    }
    public function expiry()
    {
        return $this->hasOne(Expiry::class, 'part_id');
    }
}
