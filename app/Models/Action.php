<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bookable_id',
        'bookable_type',
        'action_type',
        'remarks',
        'status',
    ];

    public function bookable()
    {
        return $this->morphTo();
    }
}
