<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\Pages\Models\Page;
use App\Debc\News\Models\News;
use App\Debc\Document\Models\Document;
use App\Http\Resources\SearchResource;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Page::class, ['title_km', 'content_km'])
            ->registerModel(News::class, ['title_km', 'content_km'])
            ->perform($request->input('query'));
        // dd($searchResults);exit;
        // return SearchResource::collection($searchResults);
        return new SearchResource($searchResults);
    }
}
