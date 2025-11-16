<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'size',
        'status',
        'description',
        'image_path',
    ];

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
}
