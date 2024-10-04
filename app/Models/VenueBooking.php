<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_date',
        'starting_time',
        'ending_time',
        'eventname',
        'event_facility',
        'booker',
        'college',
        'status',
        'club',
    ];
}
