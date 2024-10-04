<?php

namespace App\Debc\News\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ncategory extends Model
{
    use SoftDeletes;
    protected $table = 'ncategories';
    protected $guarded = ['id'];
    protected $dateFormat = 'Y-m-d';


    protected $fillable = [
        'id',
        'slug',
        'title_km',
        'title_en',
        'parent_id'
    ];

    public $dates = [
        'created_at',
        'deleted_at'
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function subcategory()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
