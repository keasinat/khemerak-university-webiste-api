<?php

namespace App\Debc\News\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\News\Models\News;
use App\Http\Resources\NewsResource;


class NewsController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->per_page ?? 12;

        $news = News::where('is_published', 1)
                ->orderByDesc('id')
                ->paginate($paginate);

        return NewsResource::collection($news);
    }

    public function show($id)
    {
        $news = News::where('is_published', 1)
            ->where('id', $id)
            ->first();

        return new NewsResource($news);
    }
}
