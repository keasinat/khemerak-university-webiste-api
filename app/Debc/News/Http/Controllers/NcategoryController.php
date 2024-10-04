<?php

namespace  App\Debc\News\Http\Controllers;

use App\Debc\News\Models\News;
use App\Debc\News\Models\Ncategory;
use Illuminate\Support\Str;
use App\Debc\News\Services\CategoryService;
use App\Debc\News\Http\Requests\StoreNcategoryRequest;
use App\Debc\News\Http\Requests\UpdateNcategoryRequest;

class NcategoryController
{
    protected $service;

    public function __construct(CategoryService $service)
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

        $categories = Ncategory::whereNull('parent_id')->orderBy('id', 'asc')->get();

        return view('news.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Ncategory::whereNull('deleted_at')
                ->where('parent_id', null)->get();

        return view('news.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNcategoryRequest $request)
    {
        $categoryData = [
            'title_km' => $request->title_km,
            'title_en' => $request->title_en,
            'slug' => Str::slug($request->slug, '-'),
            'parent_id' => $request->parent_id
        ];

        if (isset($request->parent_id)) {

            $checkDuplicate = Ncategory::where('title_km', $request->title_km)
                            ->where('parent_id', $request->parent_id)->first();

            if ($checkDuplicate) {
                return redirect()->back()->with('warning','Category already exist in this parent.');
            }
        } else {

            $checkDuplicate = Ncategory::where('title_km', $request->title_km)
                            ->where('parent_id', null)->first();

            if ($checkDuplicate) {
                return redirect()->back()->with('warning','Category already exist in this name.');
            }
        }

        Ncategory::create($categoryData);

        return redirect()->route('admin.news.category.index')
            ->with('success',__('The category was successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ncategory  $ncategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Ncategory::findOrFail($id);
        $categories = Ncategory::whereNull('parent_id')->get();

        return view('news.category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ncategory  $ncategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNcategoryRequest $request, $ncategory)
    {
        $ncategory = Ncategory::findOrfail($ncategory);

        if ($request->title_km != $ncategory->title_km || $request->parent_id != $ncategory->parent_id) {
            if (isset($request->parent_id)) {

                $checkDuplicate = Ncategory::where('title_km', $request->title_km)
                                ->where('parent_id', $request->parent_id)->first();

                if ($checkDuplicate) {
                    return redirect()->back()->with('warning','Category already exist in this parent.');
                }
            } else {

                $checkDuplicate = Ncategory::where('title_km', $request->title_km)
                                ->where('parent_id', null)->first();

                if ($checkDuplicate) {
                    return redirect()->back()->with('warning','Category already exist in this name.');
                }
            }
        }

        $this->service->update($ncategory, $request->except(['_token', '_method']));

        return redirect()->route('admin.news.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ncategory  $ncategory
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $news = News::where('ncategory_id', $id)->count();
        $category = Ncategory::findOrfail($id);

        if ($news > 0) {
            return redirect()->route('admin.news.category.index')
                    ->with('warning','Category is in used.');
        } else {
            if(count($category->subcategory))
            {
                $subcategories = $category->subcategory;
                foreach($subcategories as $cat)
                {
                    $cat = Ncategory::findOrFail($cat->id);
                    $cat->parent_id = null;
                    $cat->save();
                }
            }

            $category->delete();
            return redirect()->route('admin.news.category.index')
                    ->with('success','Category is deleted.');
        }

    }
}
