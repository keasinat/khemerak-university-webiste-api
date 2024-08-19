<?php

namespace App\Debc\Menu\Models;

use App\Trait\MenuScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use SoftDeletes, MenuScope;
    protected $table = 'academics';
    protected $guarded = ['id'];
    protected $dateFormat = 'Y-m-d';


    protected $fillable = [
        'id',
        'parent_id',
        'slug',
        'title_km',
        'title_en',
        'thumbnail',
        'description_km',
        'description_en',
        'is_published',
        'is_top',
        'is_single_page'
    ];

    public $dates = [
        'created_at',
        'deleted_at'
    ];

    public $casts= [
        'is_published' => 'boolean',
        'is_top' => 'boolean'
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
