<?php

namespace  App\Debc\Document\Http\Controllers;

use App\Debc\Document\Models\Document;
use App\Debc\Document\Models\Dcategory;
use App\Debc\Document\Models\DcategoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Debc\Document\Services\CategoryService;
use App\Debc\Document\Http\Requests\StoreDcategoryRequest;
use App\Debc\Document\Http\Requests\UpdateDcategoryRequest;

class DcategoryController
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

        $categories = Dcategory::whereNull('parent_id')->orderBy('id', 'desc')->get();
        
        return view('documents.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Dcategory::whereNull('deleted_at')
                ->where('parent_id', null)->get();

        return view('documents.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDcategoryRequest $request)
    {
        $categoryData = [
            'title_km' => $request->title_km,
            'slug' => Str::slug($request->slug, '-'),
            'parent_id' => $request->parent_id
        ];

        Dcategory::create($categoryData);

        return redirect()->route('admin.document.category.index')
            ->withFlashSuccess(__('The category was successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dcategory  $dcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $category = Dcategory::findOrFail($id);
        $categories = Dcategory::whereNull('parent_id')->get();

        return view('documents.category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dcategory  $dcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDcategoryRequest $request, $dcategory)
    {
        $dcategory = Dcategory::findOrfail($dcategory);

        $this->service->update($dcategory, $request->except(['_token', '_method']));

        return redirect()->route('admin.document.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dcategory  $dcategory
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $documents = Document::where('dcategory_id', $id)->count();
        $category = Dcategory::findOrfail($id);

        if ($documents > 0) {
            return redirect()->route('admin.document.category.index')
                    ->with('warning','Category is in used.');
        } else {
            if(count($category->subcategory))
            {
                $subcategories = $category->subcategory;
                foreach($subcategories as $cat)
                {
                    $cat = Dcategory::findOrFail($cat->id);
                    $cat->parent_id = null;
                    $cat->save();
                }
            }

            $category->delete();
            return redirect()->route('admin.document.category.index')
                    ->with('success','Category is deleted.');
        }

    }
}
