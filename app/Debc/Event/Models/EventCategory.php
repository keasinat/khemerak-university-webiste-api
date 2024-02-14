<?php

namespace App\Debc\Event\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCategory extends Model
{
    use SoftDeletes;
    protected $table = 'event_categories';
    protected $guarded = ['id'];
    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'parent_id'
    ];

    public $dates = [
        'created_at',
        'deleted_at'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function subcategory()
    {
        return $this->hasMany(EventCategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(EventCategory::class, 'parent_id');
    }
}
