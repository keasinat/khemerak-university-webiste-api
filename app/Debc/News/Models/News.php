<?php

namespace App\Debc\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class News extends Model implements Searchable
{
    use HasFactory,SoftDeletes;

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

    public $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('news.show', $this->id);
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title_km,
            $this->content_km,
            $url
        );
    }
}
