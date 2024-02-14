<?php

namespace App\Debc\Event\Http\Controllers\API;

use App\Debc\Event\Models\{EventCategory, Event};
use App\Debc\Event\Resources\{eventCategoryResource, eventResource};
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ApiEventController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $categoryId = $request->category_id;

        $events =  Event::when(!empty($categoryId), function (Builder $query) use ($categoryId) {
            $query->whereHas('ecategory', function (Builder $query) use ($categoryId) {
                $query->where('id', $categoryId);
            });
        })
            ->when(!empty($keyword), function (Builder $query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%');
            })
            ->when(!empty($startDate), function (Builder $query) use ($startDate) {
                $query->where('start_date', '>=', $startDate);
            })
            ->when(!empty($endDate), function (Builder $query) use ($endDate) {
                $query->where('end_date', '<=', $endDate);
            })->paginate($request->per_page ?? 12);

        return eventResource::collection($events);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return new eventResource($event);
    }

    public function category(Request $request)
    {
        $keyword = $request->keyword;
        $categories = EventCategory::when(!empty($keyword), function (Builder $query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        })->paginate($request->per_page ?? 9);

        return eventCategoryResource::collection($categories);
    }
}
