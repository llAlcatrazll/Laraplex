<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booker',
        'status',
        'eventname',
        'event_date',
        'starting_time',
        'ending_time',
        'event_facility',
        'college',
        'club',
        'deleted',
    ];
}
