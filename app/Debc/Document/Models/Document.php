<?php

namespace App\Debc\Document\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;
    protected $table = 'documents';
    protected $guarded = ['id'];
    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'id',
        'thumbnail',
        'file',
        'dcategory_id',
        'title_km',
    ];

    public $dates = [
        'created_at',
        'deleted_at'
    ];

    public function dcategory()
    {
        return $this->belongsTo(Dcategory::class);
    }

}
