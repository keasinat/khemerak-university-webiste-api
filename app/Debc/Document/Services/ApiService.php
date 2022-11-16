<?php

namespace App\Debc\Document\Services;

use App\Services\BaseService;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Debc\Document\Models\Document;
use App\Debc\Document\Models\Dcategory;

class ApiService extends BaseService
{
    public function getList()
    {
        $documents = Document::with('category')->whereNull('deleted_at');

        return $documents;
    }
}