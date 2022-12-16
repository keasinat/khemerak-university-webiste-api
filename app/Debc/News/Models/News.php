<?php

namespace App\Debc\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class News extends Model implements Searchable
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'id',
        'slug',
        'thumbnail',
        'title_km',
        'description_km',
        'content_km',
        'meta_keyword',
        'meta_description',
        'is_published'
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['en'=> ['title_km']]
            ]
        ];
    }

    public $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('news.show', $this->slug);
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title_km,
            $url
        );
    }
}
