<?php

namespace App\Debc\Staff\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\Staff\Models\Staff;
use App\Enum\IsPublishedEnum;
use App\Debc\Staff\Http\Resources\StaffResource;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->per_page ?? 12;
        $staffs = Staff::where('is_published', IsPublishedEnum::IS_PUBLUSHED)->paginate($paginate);

        return StaffResource::collection($staffs);
    }
}
