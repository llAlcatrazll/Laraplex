<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_type',
        'requestor',
        'date',
        'department',
        'purpose',
    ];

    public function actions()
    {
        return $this->morphMany(Action::class, 'bookable');
    }
}
