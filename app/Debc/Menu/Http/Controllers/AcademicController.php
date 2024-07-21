<?php

namespace  App\Debc\Menu\Http\Controllers;

use App\Debc\Menu\Http\Requests\UpdateAcademicRequest;
use App\Debc\Menu\Http\Requests\StoreAcademicRequest;
use Illuminate\Support\Str;
use App\Debc\Menu\Models\Academic;
use App\Debc\Menu\Models\Subject;
use App\Debc\Menu\Services\AcademicService;
class AcademicController
{
    protected $service;

    public function __construct(AcademicService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $academics = Academic::orderBy('id', 'DESC')->get();

        return view('menu.academic.index',compact('academics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Academic::whereNull('deleted_at')->whereNull('parent_id')->get();

        return view('menu.academic.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcademicRequest $request)
    {
        $data = $request->validated();

        if (isset($request->parent_id)) {

            $checkDuplicate = Academic::where('title_km', $request->title_km)->where('parent_id', $request->parent_id)->first();

            if ($checkDuplicate) {
                return redirect()->back()->with('warning','Academic already exist in this parent.');
            }
        } else {

            $checkDuplicate = Academic::where('title_km', $request->title_km)->whereNull('parent_id')->first();

            if ($checkDuplicate) {
                return redirect()->back()->with('warning','Academic already exist in this name.');
            }
        }

        $data['slug'] = Str::slug($request->slug, '_');

        if(!isset($data['is_top'])){
            $data['is_top'] = 0;
        }

        Academic::create($data);

        return redirect()->route('admin.menu.academic.index')
            ->with('success',__('The Academic was successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dcategory  $dcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Academic::findOrFail($id);
        $categories = Academic::whereNull('parent_id')->where('id','!=', $id)->get();

        return view('menu.academic.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dcategory  $dcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcademicRequest $request, $academic)
    {
        $academic = Academic::findOrfail($academic);

        if ($request->title_km != $academic->title_km || $request->parent_id != $academic->parent_id) {
            if (isset($request->parent_id)) {

                $checkDuplicate = Academic::where('title_km', $request->title_km)
                                ->where('parent_id', $request->parent_id)->first();

                if ($checkDuplicate) {
                    return redirect()->back()->with('warning','Academic already exist in this parent.');
                }
            } else {

                $checkDuplicate = Academic::where('title_km', $request->title_km)
                                ->whereNull('parent_id')->first();

                if ($checkDuplicate) {
                    return redirect()->back()->with('warning','Academic already exist in this name.');
                }
            }
        }
        $data = $request->validated();
        if(!isset($data['is_top'])){
            $data['is_top'] = 0;
        }

        $this->service->update($academic, $data);

        return redirect()->route('admin.menu.academic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dcategory  $dcategory
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $documents = Subject::where('academic_id', $id)->count();
        $category = Academic::findOrfail($id);

        if ($documents > 0) {
            return redirect()->route('admin.menu.academic.index')
                    ->with('warning','Academic is in used.');
        } else {
            if(count($category->children))
            {
                $subcategories = $category->children;
                foreach($subcategories as $cat)
                {
                    $cat = Academic::findOrFail($cat->id);
                    $cat->parent_id = null;
                    $cat->save();
                }
            }

            $category->delete();
            return redirect()->route('admin.menu.academic.index')
                    ->with('success','Academic is deleted.');
        }

    }
}
