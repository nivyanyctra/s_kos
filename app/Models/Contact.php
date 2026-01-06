<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'address',
        'business_hours',
        'email',
        'phone',
        'instagram',
        'facebook',
        'x',
        'youtube',
        'map_embed',
    ];
}
