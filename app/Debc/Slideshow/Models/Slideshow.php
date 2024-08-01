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
        'headline_km',
        'headline_en',
        'content_km',
        'content_en',
        'is_published',
        'btn_label_km',
        'btn_label_en'
    ];
}
