<?php

namespace App\Models;

use App\Enums\VenueBookingStatus;
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
        'organization',
        'status',
        'contactnumber',
    ];

    protected $casts = [
        'status' => VenueBookingStatus::class,
    ];

    public function actions()
    {
        return $this->morphMany(Action::class, 'bookable');
    }
}
