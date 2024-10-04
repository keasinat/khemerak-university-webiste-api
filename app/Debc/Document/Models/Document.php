<?php

namespace App\Debc\Document\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Document extends Model
{
    use SoftDeletes;
    protected $table = 'documents';
    protected $guarded = ['id'];
    // protected $dateFormat = 'd-m-Y';

    protected $fillable = [
        'id',
        'thumbnail',
        'file',
        'dcategory_id',
        'title_km',
        'title_en',
        'is_published',
        'post_date'
    ];

    public $dates = [
        'created_at',
        'deleted_at',
        'post_date'
    ];

    public $casts= [
        'is_published' => 'boolean',
        'post_date' => 'date'
    ];

    public function dcategory()
    {
        return $this->belongsTo(Dcategory::class);
    }

    // public function setPostDateAttribute($value)
    // {

    //     $this->attributes['post_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('d-m-Y');
    // }

    // public function getPostDateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d-m-Y');
    // }
}
