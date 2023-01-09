<?php

namespace  App\Debc\Document\Http\Controllers;

use App\Debc\Document\Models\Video;
use App\Debc\Document\Models\Dcategory;
use Illuminate\Http\Request;
use App\Debc\Document\Http\Requests\StoreVideoRequest;
use App\Debc\Document\Http\Requests\UpdateVideoRequest;
use App\Debc\Document\Services\VideoService;

class VideoController 
{
    protected $service;

    public function __construct(VideoService $service)
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
        $videos = Video::orderBy('id', 'desc')
                ->get();

        return view('documents.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
        $this->service->store($request->except(['_token']));

        return redirect()->route('admin.document.video.index')
                ->with('success', trans('dashboard.document.video_store_msg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('documents.videos.edit')->withVideo($video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, $video)
    {
        $video = Video::findOrFail($video);

        $this->service->update($video, $request->except(['_token', '_method']));

        return redirect()->route('admin.document.video.index')
            ->with('success', trans('dashboard.document.video_update_success_msg'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('admin.document.video.index')
                ->with('success', trans('dashboard.document.video_delete_success_msg'));
    }
}
