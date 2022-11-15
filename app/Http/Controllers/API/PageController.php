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
        $pages = Page::whereNull('deleted_at')->get();

        return PageResource::collection($pages);
    }

    public function show($param)
    {
        $page = Page::whereNull('deleted_at')
                    ->orWhere('id', $param)
                    ->orWhere('slug', $param)
                    ->first();

        return $page;
    }
}
