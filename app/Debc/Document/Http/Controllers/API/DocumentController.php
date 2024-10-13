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
        $paginate = $request->per_page ?? 12;

        $document = Document::query();

        if ($request->has('keyword') && !empty($keyword)) {
            $document->where('title_km', 'LIKE', '%'. $keyword .'%')
                ->where('title_en', 'LIKE', '%'. $keyword .'%');
        }

        if(isset($request->category_id)){
            $document->where('dcategory_id', $request->category_id);
        }

        $document = $document->whereNull('deleted_at')
                ->where('is_published', 1)
                ->orderBy('post_date', 'desc')
                ->paginate($paginate);

        return DocumentResource::collection($document);
    }

    public function category(Request $request)
    {
        $keyword = $request->keyword;

        $query = Dcategory::query();

        $query->when(!empty($keyword), function($q) use ($keyword) {
            $q->where('title_km', 'iLIKE', '%'. $keyword. '%');
        });

        $categories = $query->get();
        return DcategoryResource::collection($categories);
    }

    public function categoryById(Request $request)
    {
        $query = Dcategory::where('id', $request->id)->first();
        return new DcategoryResource($query);
    }
}
