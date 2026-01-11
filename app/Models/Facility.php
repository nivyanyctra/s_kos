<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'name',
        'categories',
        'description',
        'image_path',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
