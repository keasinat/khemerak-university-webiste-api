<?php

namespace App\Debc\Slideshow\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\Slideshow\Models\Slideshow;
use App\Debc\Slideshow\Http\Resources\SlideshowResource;

class SlideshowController extends Controller
{
    public function index()
    {
        $response = Slideshow::where('is_published',1)->get();

        return SlideshowResource::collection($response);
    }
}
