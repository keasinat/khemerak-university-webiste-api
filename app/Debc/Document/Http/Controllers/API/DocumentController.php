<?php

namespace App\Debc\Document\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Controllers\API\BaseController as BaseController;
use App\Debc\Document\Models\Document;
use App\Debc\Document\Models\Dcategory;
use App\Http\Resources\DocumentResource;
use App\Http\Resources\DcategoryResource;
use App\Enum\IsPublishedEnum;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $category = $request->category;
        $paginate = $request->per_page ?? 12;

        $document = new Document;
        $categories = new Dcategory;

        if ($request->has('keyword') && !empty($keyword)) {
            $document = $document->whereNull('deleted_at')
                ->where('is_published', 1)
                ->where('title_km', 'LIKE', '%'. $keyword .'%')
                ->orderBy('post_date', 'desc')
                ->paginate($paginate);

            return DocumentResource::collection($document);
        }

        if ($request->has('category')  && !empty($category)) {
            $categories = $categories::with('documents')
                ->whereNull('deleted_at')
                ->where('is_published', 1)
                ->where('title_km', 'LIKE', '%'. $category .'%')
                ->orderBy('post_date', 'desc')
                ->paginate($paginate);

            return DocumentResource::collection($categories);

        }

        $document = $document::with('dcategory')
                ->whereNull('deleted_at')
                ->where('is_published', 1)
                ->orderBy('post_date', 'desc')
                ->paginate($paginate);

        return DocumentResource::collection($document);
    }

    public function category(Request $request)
    {
        $keyword = $request->keyword;
        $category = $request->category;
        $paginate = $request->per_page ?? 9;

        $query = Dcategory::query();

        $query->when(!empty($keyword), function($q) use ($keyword) {
            $q->where('title_km', 'iLIKE', '%'. $keyword. '%');
            // $q->where('is_published', IsPublishedEnum::IS_PUBLUSHED);
        });

        $query->when(!empty($category), function($q) use ($category) {
            // $q->where('is_published', IsPublishedEnum::IS_PUBLUSHED);
            $q->whereNull('deleted_at');
            $q->where('title_km', 'iLIKE', '%'. $category .'%');
        });

        // if ($request->has('keyword') && !empty($keyword)) {
        //     $categories = $categories->whereNull('deleted_at')
        //         ->where('title_km', 'LIKE', '%'. $keyword .'%')
        //         ->where('is_published', 1)
        //         ->paginate($paginate);

        //     return DocumentResource::collection($document);
        // }

        // if ($request->has('category')  && !empty($category)) {
        //     $categories = $categories::with('documents')->has('documents')
        //         ->whereNull('deleted_at')
        //         ->where('is_published', 1)
        //         ->where('title_km', 'LIKE', '%'. $category .'%')
        //         ->orderBy('post_date', 'desc')
        //         ->paginate($paginate);

        //     return DocumentResource::collection($query);

        // }

        // $categories = Dcategory::with('documents')->has('documents')->get();
            $categories = $query->with('documents', function($q) {
                $q->where('is_published', IsPublishedEnum::IS_PUBLUSHED);
            })->paginate($paginate);
        return DcategoryResource::collection($categories);
    }

    public function categorySlug($slug, Request $request)
    {

        $paginate = $request->per_page ?? 12;

        $categoryId = Dcategory::where('slug', $slug)->pluck('id');

        $documents = Document::whereHas('dcategory', function ($q) use ($categoryId) {
            $q->whereIn('parent_id', [$categoryId]);
            $q->orWhereIn('dcategory_id', [$categoryId]);
        })
        ->where('is_published', 1)
        ->orderBy('post_date', 'desc')
        ->paginate($paginate);

        return DocumentResource::collection($documents);
    }
}
