<?php

namespace App\Debc\Menu\Http\Controllers\API;

use App\Debc\Menu\Http\Requests\Api\ShowRequest;
use App\Debc\Menu\Http\Requests\Api\SubjectListRequest;
use App\Debc\Menu\Http\Resources\AcademicDetailResource;
use App\Debc\Menu\Http\Resources\AcademicResource;
use App\Debc\Menu\Http\Resources\MenuResource;
use App\Debc\Menu\Models\Academic;
use App\Debc\Menu\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuController extends Controller
{
    public function index(Request $request) : ResourceCollection
    {
        $data = Academic::Parents()->isPublished()->with('children')->get();
        return MenuResource::collection($data);
    }

    public function topAcademics() : ResourceCollection
    {
        $data = Academic::isTop()->isPublished()->get();
        return AcademicResource::collection($data);
    }

    public function academics() : ResourceCollection
    {
        $data = Academic::isPublished()->parents()->with('children')->get();
        return AcademicResource::collection($data);
    }

    public function academicDetail(Request $request)
    {
        $data = null;
        if(isset($request->id)){
            $data = Academic::findOrFail($request->id);
        }
        return new AcademicDetailResource($data);
    }

    public function topSubjects(Request $request) : ResourceCollection
    {
        $data = Subject::isTop()->isPublished()->get();
        return AcademicResource::collection($data);
    }

    public function subjectList(Request $request) : ResourceCollection
    {
        $data = Subject::isPublished();
        if(isset($request->menu_id)){
            $data->where('academic_id', $request->menu_id);
        }

        return MenuResource::collection($data->get());
    }

    public function subjects(Request $request) : ResourceCollection
    {
        $data = Subject::isPublished();
        $per_page = $request->per_page ?? 12;
        if(isset($request->menu_id)){
            $data->where('academic_id', $request->menu_id);
        }
        return AcademicResource::collection($data->paginate($per_page));
    }

    public function subjectDetail(Request $request)
    {
        $data = null;
        if(isset($request->id)){
            $data = Subject::findOrFail($request->id);
        }
        return new AcademicDetailResource($data);
    }

    function singlePage(Request $request)
    {
        $data = null;
        if(isset($request->menu_id)){
            $data = Subject::where('academic_id', $request->menu_id)->firstOrFail();
        }
        return new AcademicDetailResource($data);
    }
}
