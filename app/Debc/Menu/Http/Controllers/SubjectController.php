<?php

namespace  App\Debc\Menu\Http\Controllers;

use App\Debc\Menu\Http\Requests\StoreSubjectRequest;
use App\Debc\Menu\Http\Requests\UpdateSubjectRequest;
use App\Debc\Menu\Models\Academic;
use App\Debc\Menu\Models\Subject;
use App\Debc\Menu\Services\SubjectService;

class SubjectController
{
    protected $service;
    public function __construct(SubjectService $service)
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
        $subjects = Subject::with('academic')->get();

        return view('menu.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academics = Academic::whereNull('parent_id')->get();

        return view('menu.subject.create', compact('academics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        // dd($request->validated());
        $data = $this->service->store($request->validated());
        // dd($data);
        return redirect()
            ->route('admin.menu.subject.index')
            ->withFlashSuccess(__('The Subject was successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $academics = Academic::get();

        return view('menu.subject.edit', compact('academics'))->withSubject($subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, $subject)
    {
        $subject = Subject::findorfail($subject);
        $data = $request->validated();
        if(!isset($data['is_top'])){
            $data['is_top'] = 0;
        }

        $this->service->update($subject, $data);

        return redirect()->route('admin.menu.subject.index')
            ->withFlashSuccess(__('The Subject was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('admin.menu.subject.index')->withFlashSucess('Data was deleted');
    }
}
