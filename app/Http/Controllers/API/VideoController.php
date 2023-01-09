<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\VideoResource;
use App\Debc\Document\Models\Video;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->per_page ?? 12;

        $videos = Video::orderBy('id', 'desc')->paginate($paginate);

        return VideoResource::collection($videos);
    }
}
