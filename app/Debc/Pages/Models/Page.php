<?php

namespace App\Debc\Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Page extends Model implements Searchable
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

    public function getSearchResult(): SearchResult
    {
        $url = route('page.show', $this->slug);
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title_km,
            $url
        );
    }
}
