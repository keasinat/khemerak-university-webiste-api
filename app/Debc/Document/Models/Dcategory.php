<?php

namespace App\Debc\Document\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Dcategory extends Model 
{
    use SoftDeletes;
    protected $table = 'dcategories';
    protected $guarded = [];
    protected $dateFormat = 'Y-m-d';


    protected $fillable = [
        'id',
        'slug',
        'title_km',
        'parent_id'
    ];

    public $dates = [
        'created_at',
        'deleted_at'
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function subcategory()
    {
        return $this->hasMany(Dcategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Dcategory::class, 'parent_id');
    }
}
