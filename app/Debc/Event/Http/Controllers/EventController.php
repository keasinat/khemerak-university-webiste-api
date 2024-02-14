<?php

namespace App\Debc\Event\Http\Controllers;

use Illuminate\Http\Request;
use App\Debc\Event\Models\Event;
use App\Debc\Event\Models\EventCategory;
use App\Debc\Event\Http\Requests\StoreEventRequest;
use App\Debc\Event\Http\Requests\UpdateEventRequest;
use App\Debc\Event\Http\Services\EventService;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class EventController
{
    protected $service;

    public function __construct(EventService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $events = Event::with('ecategory')->whereNull('deleted_at')->get();

        return view('events.index', compact('events'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EventCategory::whereNull('deleted_at')->whereNull('parent_id')->get();

        return view('events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {

        $Data = [
            'title' => $request->title,
            'content' => $request->content,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'thumbnail' =>  $request->thumbnail,
            'location' => $request->location,
            'is_published' => $request->is_published,
            'event_category_id' => $request->event_category_id
        ];

        Event::create($Data);

        return redirect()
            ->route('admin.event.index')
            ->withFlashSuccess(__('The Event was successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $categories = EventCategory::whereNull('deleted_at')->whereNull('parent_id')->get();
        return view('events.edit', compact('categories'))->withEvent($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $event)
    {
        $event = Event::findorfail($event);
        $this->service->update($event, $request->except(['_token', '_method']));

        return redirect()->route('admin.event.index')
            ->withFlashSuccess(__('Event was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
         $event->delete();
        return redirect()->route('admin.event.index')->withFlashSucess('Event was deleted');
    }
}
