<?php

namespace App\Debc\Event\Http\Controllers\API;

use App\Debc\Event\Models\{ Event};
use App\Debc\Event\Http\Resources\EventResource;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Enum\isPublishedEnum;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $paginate = $request->per_page ?? 12;

        $events =  Event::query();

        $events->when(!empty($keyword), function (Builder $query) use ($keyword) {
                $query->where('title', 'iLIKE', '%' . $keyword . '%');
            });
        $events->when(!empty($startDate), function (Builder $query) use ($startDate) {
                $query->where('start_date', '>=', $startDate);
            });
        $events->when(!empty($endDate), function (Builder $query) use ($endDate) {
                $query->where('end_date', '<=', $endDate);
            });
        $events = $events->whereNull('deleted_at')->where('is_published', isPublishedEnum::IS_PUBLUSHED)->paginate($paginate);

        return EventResource::collection($events);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return new EventResource($event);
    }

}
