<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Controllers\API\BaseController as BaseController;
use App\Debc\Document\Models\Document;
use App\Debc\Document\Models\Dcategory;
use App\Http\Resources\DocumentResource;
use App\Http\Resources\DcategoryResource;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $category = $request->category;
        $paginate = $request->per_page ?? 9;

        $document = new Document;
        $categories = new Dcategory;

        if ($request->has('keyword') && !empty($keyword)) {
            $document = $document->whereNull('deleted_at')
                ->where('title_km', 'LIKE', '%'. $keyword .'%')    
                ->paginate($paginate);

            return DocumentResource::collection($document);
        }

        if ($request->has('category')  && !empty($category)) {
            $categories = $categories::with('documents')
                ->whereNull('deleted_at')
                ->where('title_km', 'LIKE', '%'. $category .'%')
                ->paginate($paginate);
            
            return DocumentResource::collection($categories);
        
        }

        $document = $document::with('dcategory')
                ->whereNull('deleted_at')
                ->paginate($paginate);
        
        return DocumentResource::collection($document);
    }

    public function category(Request $request)
    {
        $keyword = $request->keyword;
        $category = $request->category;
        $paginate = $request->per_page ?? 9;

        $categories = new Dcategory;

        if ($request->has('keyword') && !empty($keyword)) {
            $categories = $categories->whereNull('deleted_at')
                ->where('title_km', 'LIKE', '%'. $keyword .'%')    
                ->paginate($paginate);

            return DocumentResource::collection($document);
        }

        if ($request->has('category')  && !empty($category)) {
            $categories = $categories::with('documents')->has('documents')
                ->whereNull('deleted_at')
                ->where('title_km', 'LIKE', '%'. $category .'%')
                ->paginate($paginate);
            
            return DocumentResource::collection($categories);
        
        }

        $categories = Dcategory::with('documents')->has('documents')->get();

        return DcategoryResource::collection($categories);
    }

    public function categorySlug($slug)
    {
        $category = Dcategory::with('documents')
                    ->has('documents')
                    ->where('slug', $slug)
                    ->paginate();

        return DcategoryResource::collection($category);
    }
}
