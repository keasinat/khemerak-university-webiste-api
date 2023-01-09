<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\Pages\Models\Page;
use App\Http\Resources\PageResource;


class PageController extends Controller
{
    public function index()
    {
        $pages = Page::whereNull('deleted_at')
                ->where('is_published', 1)
                ->get();

        return PageResource::collection($pages);
    }

    public function show($param)
    {
       
        // $page = Page::whereNull('deleted_at')
        //             ->where('is_published', 1)
        //             // ->Where('id', $param)
        //             ->where('slug', '%'.$param.'%')
        //             ->first();
        $page = Page::whereNull('deleted_at')
                    ->where('is_published', 1)
                    ->where('id', $param)
                    ->orWhere('slug', $param)
                    ->firstOrFail();
        return new PageResource($page);
        // return $page;
    }
}
