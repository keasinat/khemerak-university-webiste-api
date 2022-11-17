<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\News\Models\News;
use App\Http\Resources\NewsResource;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::whereNull('deleted_at')->get();

        return NewsResource::collection($news);
    }
    public function show(Request $request)
    {
        $news = Page::whereNull('deleted_at')
        ->orWhere('id', $id)
        ->first();

        return $news;
    }
}
