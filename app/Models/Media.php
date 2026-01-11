<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'room_id',
        'file_url',
        'type',
        'order',
    ];
}
