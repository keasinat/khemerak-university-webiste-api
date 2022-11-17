<?php

namespace App\Debc\News\Http\Controllers;

use App\Debc\News\Models\News;
use App\Debc\News\Http\Requests\StoreNewsRequest;

use Illuminate\Http\Request;

class NewsController 
{
    public function __construct()
    {

    }

    public function index()
    {
        $news = News::get();

        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(StoreNewsRequest $request)
    {
        News::create($request->all());
        
        return redirect()->route('admin.news.index')->with('success', 'The post was successfully created.');
    }

    public function destroy($id)
    {
        News::find($id)->delete();

        return redirect()->route('admin.news.index')->with('success', 'The post was successfully deleted !');
    }
    public function edit(News $news, $id){
        
        $news= News::where("id",$id)->first();
        
        return view('news.edit', compact('news'));
    
    }
    public function update(StoreNewsRequest $request, $id )
    {

        // News::where('id', $id)->update($request->except(['_token', '_method']));
        $news = News::findorFail($id);
        $news->update($request->except(['_token', '_method']));

        return redirect()->route('admin.news.index')->with('success', 'The post was successfully updated !');
    }
}
