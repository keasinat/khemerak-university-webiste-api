<?php

namespace App\Debc\Partner\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enum\isPublishedEnum;
use App\Debc\Partner\Models\Partner;
use App\Debc\Partner\Http\Resources\PartnerResource;

class PartnerController extends Controller
{
    public function index()
    {
        $query = Partner::where('is_published', isPublishedEnum::IS_PUBLUSHED)->get();

        return PartnerResource::collection($query);
    }
}
