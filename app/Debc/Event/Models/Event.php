<?php

namespace App\Debc\Event\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    // public function startDate(): Attribute 
    // {
    //     return Attribute::make(
    //         get: fn ($value) => Carbon::parse($value)->format('d-m-Y')
    //     );
    // }

    // public function endDate(): Attribute 
    // {
    //     return Attribute::make(
    //         get: fn ($value) => Carbon::parse($value)->format('d-m-Y')
    //     );
    // }
}
