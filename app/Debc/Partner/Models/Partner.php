<?php

namespace App\Debc\Partner\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_km',
        'title_en',
        'logo',
        'link',
        'is_published'
    ];
}
