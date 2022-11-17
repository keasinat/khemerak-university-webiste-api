<?php

namespace App\Debc\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'id',
        'slug',
        'thumbnail',
        'title',
        'description',
        'content',
        'meta_keyword',
        'meta_description',
        'is_published'
    ];

    public $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
