<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\BusinessActivity\Models\Category;
use App\Http\Resources\ActivityResource;

class ActivityController extends Controller
{
    public function getList(Request $request)
    {
        $searchCode = $request->code;
        $searchTitle = $request->title;

        $activity = new Category;

        if ($request->has('code') && !empty($searchCode)) {
            $activity = $activity->where('code', 'LIKE', '%'. $searchCode .'%')
                        ->orWhere('sub_group', 'LIKE', '%'. $searchCode .'%')
                        ->paginate(12);
            
            return ActivityResource::collection($activity);
        }

        if ($request->has('title') && !empty($searchTitle)) {
            $activity = $activity->where('name_km', 'LIKE', '%'.$searchTitle.'%')
                        ->orWhere('m_name_km', 'LIKE', '%'. $searchTitle.'%')
                        ->paginate(12);

            return ActivityResource::collection($activity);
        }

        $activity = $activity->paginate(12);

        return ActivityResource::collection($activity);
    }

    public function show($slug)
    {
        $activity = Category::where('slug', $slug)
                    // ->whereNull('deleted_at')
                    ->first();
    }
}
