<?php

namespace App\Debc\Partner\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\Partner\Services\PartnerService;
use App\Debc\Partner\Http\Requests\{ StorePartnerRequest, UpdatePartnerRequest };
use App\Debc\Partner\Models\Partner;
class PartnerController extends Controller
{
    private $service;
    public function __construct(PartnerService $service) {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = $this->service->getList();

        return view('partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        $this->service->store($request->all());

        return redirect()->route('admin.partner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $this->service->update($partner, $request->except(['_token', '_method']));

        return redirect()->route('admin.partner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('admin.partner.index');
    }
}
