<?php

namespace App\Debc\Document\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';
    protected $guarded = ['id'];
    
    protected $fillable = [
        'id',
        'thumbnail',
        'file',
        'title_km',
    ];

    public $dates = [
        'created_at'
    ];

}
