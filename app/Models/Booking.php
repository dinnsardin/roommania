<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Booking extends Model
{
    protected $fillable = [

    'booking_id',

    'user_id',

    'room_id',

    'start_datetime',

    'end_datetime',

    'booking_date',

    'booking_time',

    'purpose',

    'status',

];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
