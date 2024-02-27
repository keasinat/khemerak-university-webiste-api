<?php

namespace App\Debc\Staff\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $fillable = [
        'name_en',
        'name_km',
        'position_en',
        'position_km',
        'bio_en',
        'bio_km',
        'short_desc_en',
        'short_desc_km',
        'status',
        'thumbnail'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}
