<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'duration',
        'room_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
