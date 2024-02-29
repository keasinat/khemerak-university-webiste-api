<?php

namespace App\Debc\Slideshow\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\Slideshow\Services\SlideshowService;
use App\Debc\Slideshow\Http\Requests\{StoreSlideRequest, UpdateSlideRequest};

class SlideshowController extends Controller
{
    protected $service;

    public function __construct(SlideshowService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slideshows = $this->service->getList();

        return view('slideshow.index', compact('slideshows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slideshow.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlideRequest $request)
    {
        $this->service->store($request->all());

        return redirect()->route('admin.slideshow.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlideRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
