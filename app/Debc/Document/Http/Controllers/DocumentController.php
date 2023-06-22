<?php

namespace  App\Debc\Document\Http\Controllers;

use App\Debc\Document\Models\Document;
use App\Debc\Document\Models\Dcategory;
use Illuminate\Http\Request;
use App\Debc\Document\Http\Requests\StoreDocumentRequest;
use App\Debc\Document\Http\Requests\UpdateDocumentRequest;
use App\Debc\Document\Services\DocumentService;
use Carbon\Carbon;


class DocumentController
{
    protected $service;
    // protected $roleService;
    // protected $permissionService;

    public function __construct(DocumentService $service)
    {
        $this->service = $service;
        // $this->roleService = $roleService;
        // $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::with('dcategory')->whereNull('deleted_at')->get();

        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Dcategory::whereNull('deleted_at')->whereNull('parent_id')->get();

        return view('documents.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {
        // dd($request->all());
        $request->post_date = Carbon::createFromFormat('d-m-Y', $request->post_date)->format('d-m-Y');
        $this->service->store($request->except(['_token']));

        return redirect()
            ->route('admin.document.index')
            ->withFlashSuccess(__('The Document was successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $categories = Dcategory::whereNull('deleted_at')->whereNull('parent_id')->get();

        return view('documents.edit', compact('categories'))->withDocument($document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, $document)
    {
        $document = Document::findorfail($document);//dd($request->all());
        // $document->post_date =  Carbon::createFromFormat('d-m-Y', $request->post_date)->format('d-m-Y');
        $document->post_date = Carbon::createFromFormat('d-m-Y', $request->post_date)->format('d-m-Y');

        $this->service->update($document, $request->except(['_token', '_method']));

        return redirect()->route('admin.document.index')
            ->withFlashSuccess(__('The Document was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('admin.document.index')->withFlashSucess('Data was deleted');
    }
}
