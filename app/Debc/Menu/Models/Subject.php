<?php

namespace App\Debc\Menu\Models;

use App\Trait\MenuScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes, MenuScope;
    protected $table = 'subjects';
    protected $guarded = ['id'];

    protected $fillable = [
        'id',
        'academic_id',
        'slug',
        'title_km',
        'title_en',
        'thumbnail',
        'description_km',
        'description_en',
        'is_published',
        'is_top',
        'highlight_km',
        'highlight_en'
    ];

    public $dates = [
        'created_at',
        'deleted_at',
    ];

    public $casts= [
        'is_published' => 'boolean',
        'is_top' => 'boolean'
    ];

    public function academic()
    {
        return $this->belongsTo(Academic::class);
    }

}
