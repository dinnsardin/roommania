<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_id',
        'room_name',
        'room_type',
        'capacity',
        'status',
        'is_under_maintenance',
        'maintenance_note',
        'maintenance_until',
    ];
}
