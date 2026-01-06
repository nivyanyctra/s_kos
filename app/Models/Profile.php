<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'slogan',
        'description',
        'story',
        'logo_path',
        'photo_path',
        'video_path',
    ];
}
