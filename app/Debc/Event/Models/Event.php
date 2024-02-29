<?php

namespace App\Debc\Event\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Event extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    public $table = 'events';

    protected $fillable = [
        'id',
        'title',
        'content',
        'description',
        'thumbnail',
        'start_date',
        'end_date',
        'location',
        'is_published',
    ];

    protected $cast = [
        'is_published' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public $dates = [
        'created_at',
        'deleted_at',
        'start_date',
        'end_date',
    ];

}
