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
        $query = $request->input('query');

        if($request->has('query') && !empty($query)) {
            $searchResults = (new Search())
                ->registerModel(Page::class, ['title_km'])
                ->registerModel(News::class, ['title_km'])
                ->perform($query);

            return new SearchResource($searchResults);
        }
    }
}
