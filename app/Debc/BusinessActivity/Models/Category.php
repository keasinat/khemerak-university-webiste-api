<?php

namespace App\Debc\BusinessActivity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'group',
        'sub_group',
        'code',
        'name_km',
        'slug',
        'm_name_km',
    ];
}
