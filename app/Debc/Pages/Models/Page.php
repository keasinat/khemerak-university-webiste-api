<?php

namespace App\Debc\Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pages';
    protected $fillable = [
        'title_km',
        'meta_keyword',
        'meta_description',
        'content_km',
        'slug',
        'is_published'
    ];

    public $dates = [
        'deleted_at',
        'created_at'
    ];
}
