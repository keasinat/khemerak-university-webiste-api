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

    public function academicDetail(ShowRequest $request)
    {
        $data = Academic::findOrFail($request->id);
        return new AcademicDetailResource($data);
    }

    public function topSubjects(Request $request) : ResourceCollection
    {
        $data = Subject::isTop()->isPublished()->get();
        return AcademicResource::collection($data);
    }

    public function subjectList(SubjectListRequest $request) : ResourceCollection
    {
        $data = Subject::isPublished()->where('academic_id', $request->menu_id)->get();

        return MenuResource::collection($data);
    }

    public function subjects(Request $request) : ResourceCollection
    {
        $data = Subject::isPublished()->get();
        return AcademicResource::collection($data);
    }

    public function subjectDetail(ShowRequest $request)
    {
        $data = Subject::findOrFail($request->id);
        return new AcademicDetailResource($data);
    }
}
