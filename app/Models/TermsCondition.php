<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    protected $fillable = [
        'title',
        'version',
        'effective_date',
        'content',
        'is_active',
    ];
}
