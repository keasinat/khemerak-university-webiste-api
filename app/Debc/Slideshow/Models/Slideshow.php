<?php

namespace App\Debc\Slideshow\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'link',
        'headline',
        'content',
        'is_published'
    ];
}
