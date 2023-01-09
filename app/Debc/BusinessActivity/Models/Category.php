<?php

namespace App\Debc\BusinessActivity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    protected $dateFormat = 'Y-m-d';
    protected $table = 'categories';

    protected $fillable = [
        'group',
        'sub_group',
        'code',
        'name_km',
        'slug',
        'm_name_km',
    ];

    public $dates = [
        'deleted_at',
        'created_at'
    ];
}
