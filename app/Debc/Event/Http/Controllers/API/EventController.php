<?php

namespace App\Debc\Event\Http\Controllers\API;

use App\Debc\Event\Models\{ Event};
use App\Debc\Event\Resources\{ eventResource};
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
            })
            ->when(!empty($startDate), function (Builder $query) use ($startDate) {
                $query->where('start_date', '>=', $startDate);
            })
            ->when(!empty($endDate), function (Builder $query) use ($endDate) {
                $query->where('end_date', '<=', $endDate);
            })->paginate($paginate);

        return EventResource::collection($events);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return new EventResource($event);
    }

}
