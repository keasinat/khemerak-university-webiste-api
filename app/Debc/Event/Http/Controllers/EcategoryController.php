<?php

namespace App\Debc\Event\Http\Controllers;

use Illuminate\Http\Request;
use App\Debc\Event\Models\Event;
use App\Debc\Event\Models\EventCategory;
use App\Debc\Event\Http\Services\CategoryService;
use App\Debc\Event\Http\Requests\StoreEcategoryRequest;
use App\Debc\Event\Http\Requests\UpdateEcategoryRequest;
use Illuminate\Support\Str;


class EcategoryController
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
        $categories = EventCategory::whereNull('parent_id')->orderBy('id', 'asc')->get();
        
        return view('events.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EventCategory::whereNull('deleted_at')
                ->where('parent_id', null)->get();
        return view('events.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEcategoryRequest $request)
    {
        $categoryData = [
            'name' => $request->name,
            'slug' => Str::slug($request->slug, '-'),
            'parent_id' => $request->parent_id
        ];

        if (isset($request->parent_id)) {

            $checkDuplicate = EventCategory::where('name', $request->name)
                            ->where('parent_id', $request->parent_id)->first();

            if ($checkDuplicate) {
                return redirect()->back()->with('warning','Category already exist in this parent.');
            }
        } else {

            $checkDuplicate = EventCategory::where('name', $request->name)
                            ->where('parent_id', null)->first();
            
            if ($checkDuplicate) {
                return redirect()->back()->with('warning','Category already exist in this name.');
            }
        }

        EventCategory::create($categoryData);

        return redirect()->route('admin.event.category.index')
            ->with('success',__('The category was successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = EventCategory::findOrFail($id);
        $categories = EventCategory::whereNull('parent_id')->get();

        return view('events.category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEcategoryRequest $request, $ecategory)
    {
        $ecategory = EventCategory::findOrfail($ecategory);

        if ($request->name != $ecategory->name || $request->parent_id != $ecategory->parent_id) {
            if (isset($request->parent_id)) {

                $checkDuplicate = EventCategory::where('name', $request->name)
                                ->where('parent_id', $request->parent_id)->first();

                if ($checkDuplicate) {
                    return redirect()->back()->with('warning','Category already exist in this parent.');
                }
            } else {

                $checkDuplicate = EventCategory::where('name', $request->name)
                                ->where('parent_id', null)->first();
                
                if ($checkDuplicate) {
                    return redirect()->back()->with('warning','Category already exist in this name.');
                }
            }
        }

        $this->service->update($ecategory, $request->except(['_token', '_method']));

        return redirect()->route('admin.event.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Event::where('event_category_id', $id)->count();
        $category = EventCategory::findOrfail($id);

        if ($events > 0) {
            return redirect()->route('admin.event.category.index')
                    ->with('warning','Category is in used.');
        } else {
            if(count($category->subcategory))
            {
                $subcategories = $category->subcategory;
                foreach($subcategories as $cat)
                {
                    $cat = EventCategory::findOrFail($cat->id);
                    $cat->parent_id = null;
                    $cat->save();
                }
            }

            $category->delete();
            return redirect()->route('admin.event.category.index')
                    ->with('success','Category is deleted.');
        }
    }
}
