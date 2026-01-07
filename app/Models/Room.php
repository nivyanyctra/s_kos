<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'size',
        'status',
        'description',
        'cover_image',
    ];

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
}
