<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityReport extends Model
{
    protected $fillable = [

        'user_id',

        'room_id',

        'issue_title',

        'issue_description',

        'status',

        'issue_image',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}