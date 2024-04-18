<?php

namespace App\Debc\Slideshow\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\Slideshow\Models\Slideshow;
use App\Debc\Slideshow\Http\Resources\SlideshowResource;
use App\Enum\isPublishedEnum;

class SlideshowController extends Controller
{
    public function index()
    {
        $response = Slideshow::where('is_published', isPublishedEnum::IS_PUBLUSHED)->get();

        return SlideshowResource::collection($response);
    }
}
