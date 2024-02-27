<?php

namespace App\Debc\Staff\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Debc\Staff\Models\Staff;
use App\Debc\Staff\Http\Requests\{StoreStaffRequest, UpdateStaffRequest};
use App\Debc\Staff\Services\StaffService;

class StaffController extends Controller
{
    protected $service;

    public function __construct(StaffService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $staffs = $this->service->getList();

        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit',compact('staff'));
    }

    public function store(StoreStaffRequest $request)
    {
        $this->service->store($request->all());

        return redirect()->route('admin.staff.index');
    }

    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        $this->service->update($staff, $request->except(['_token', '_method']));
        return redirect()->route('admin.staff.index');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('admin.staff.index');

    }
}
