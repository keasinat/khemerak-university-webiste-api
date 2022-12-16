<?php

namespace App\Debc\Pages\Http\Controllers;

use App\Debc\Pages\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Debc\Pages\Http\Requests\StorePageRequest;
use App\Debc\Pages\Http\Requests\UpdatePageRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:page-list|page-create|page-edit|page-delete', ['only' => ['index']]);
        $this->middleware('permission:page-create', ['only' => ['create','store']]);
        $this->middleware('permission:page-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();

        return view('pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        Page::create($request->all());

        return redirect()->route('admin.page.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('pages.edit')->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $page)
    {
        $p = Page::findOrFail($page);

        $p->update( $request->except(['_token', '_method']) );

        return redirect()->route('admin.page.index')->withFlashSuccess(__('The page was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.page.index')
            ->withFlashSuccess(__('The page was successfully deleted.'));
    }
}
