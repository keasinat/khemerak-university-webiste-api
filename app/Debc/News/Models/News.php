<?php

namespace App\Debc\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'id',
        'thumbnail',
        'title_km',
        'title_en',
        'description_km',
        'description_en',
        'content_km',
        'content_en',
        'meta_keyword',
        'meta_description',
        'is_published',
    ];


    public $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];


}
