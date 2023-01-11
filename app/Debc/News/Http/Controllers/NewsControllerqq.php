<?php

namespace App\Debc\News\Http\Controllers;

use App\Debc\News\Models\News;
use App\Debc\News\Http\Requests\StoreNewsRequest;
use App\Debc\News\Http\Requests\UpdateNewsRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

use Illuminate\Http\Request;

class NewsController 
{

    public function index()
    {
        $news = News::whereNull('deleted_at')->orderBy('id', 'DESC')->get();

        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(StoreNewsRequest $request)
    {
        $newsData = [
            'slug' => $request->slug ?? $request->id,
            'thumbnail' => $request->thumbnail,
            'title_km' => $request->title_km,
            'description_km' => $request->description_km,
            'content_km' => $request->content_km,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'is_published' => $request->is_published
        ];
        // dd($request->all());
        News::create($newsData);
        
        return redirect()->route('admin.news.index')->with('success', 'The post was successfully created.');
    }

    public function destroy($id)
    {
        News::find($id)->delete();

        return redirect()->route('admin.news.index')->with('success', 'The post was successfully deleted !');
    }

    public function edit(News $news){
        
        return view('news.edit')->withNews($news);
    
    }

    public function update(UpdateNewsRequest $request, $news )
    {

        $news = News::findorFail($news);
        $news->update($request->except(['_token', '_method']));

        return redirect()->route('admin.news.index')->with('success', 'The post was successfully updated !');
    }
    // public function check_slug(Request $request)
    // {   
    //     $slug= '';
    //     if(!empty($request->title_km)) {
    //         $slug = SlugService::createSlug(News::class, 'slug', $request->title_km);
    //     }

    //     return response()->json(['slug' => $slug]);
    // }
}
