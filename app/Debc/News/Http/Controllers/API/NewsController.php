<?php

namespace App\Debc\News\Http\Controllers\API;

use App\Debc\Document\Models\Dcategory;
use App\Debc\News\Models\Ncategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\News\Models\News;
use App\Http\Resources\DcategoryResource;
use App\Http\Resources\NewsResource;


class NewsController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->per_page ?? 12;

        $news = News::query();
        if(isset($request->category_id)){
            $news->where('ncategory_id', $request->category_id);
        }

        $news = $news->where('is_published', 1)
                ->orderByDesc('id')
                ->paginate($paginate);

        return NewsResource::collection($news);
    }

    public function show(Request $request)
    {
        $news = News::where('is_published', 1)
            ->where('id', $request->id)
            ->first();

        return new NewsResource($news);
    }

    function categories(Request $request)
    {
        $categories = Ncategory::orderBy('id')->get();
        return DcategoryResource::collection($categories);
    }

    function categoryById(Request $request)
    {
        $query = Ncategory::where('id', $request->id)->first();

        return new DcategoryResource($query);
    }
}
