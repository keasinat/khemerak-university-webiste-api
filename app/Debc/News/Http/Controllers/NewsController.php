<?php

namespace App\Debc\News\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\News\Services\NewsService;
use App\Debc\News\Http\Requests\StoreNewsRequest;
use App\Debc\News\Http\Requests\UpdateNewsRequest;
use Illuminate\Support\Str;
use App\Debc\News\Models\News;

class NewsController extends Controller
{
    protected $service;
    public function __construct(NewsService $service)
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
        $newsList = $this->service->getList()->get();

        return view('news.index', compact('newsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $this->service->store($request->except(['_token']));

        return redirect()->route('admin.news.index')->with('success', __('Data was store successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit')->withNews($news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request,News $news)
    {
        $this->service->update($news, $request->except(['_token', '_method']));

        return redirect()->route('admin.news.index')->with('success', __('Data was update successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($news)
    {
        // dd($news);
        News::find($news)->delete();

        return redirect()->route('admin.news.index')
            ->with('success', __('Data delete successfully.'));
    }
}
