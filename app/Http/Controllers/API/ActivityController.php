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
        $searchTitle = $request->title;

        $activity = new Category;

        if ($request->has('title') && !empty($searchTitle)) {
            $activity = $activity->where('name_km', 'LIKE', '%'.$searchTitle.'%')
                        ->orWhere('m_name_km', 'LIKE', '%'. $searchTitle.'%')
                        ->orWhere('sub_group', 'LIKE', '%'. $searchTitle .'%')
                        ->orWhere('code', 'LIKE', '%'. $searchTitle .'%')
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
