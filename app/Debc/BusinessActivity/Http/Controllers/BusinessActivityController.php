<?php

namespace App\Debc\BusinessActivity\Http\Controllers;

use Illuminate\Http\Request;
use App\Debc\BusinessActivity\Models\Category;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoriesImport;
use App\Debc\BusinessActivity\Http\Requests\StoreActivityRequest;
use App\Debc\BusinessActivity\Services\ActivityService;

class BusinessActivityController
{
    public function index()
    {
        return view('activity.index');
    }

    public function create()
    {
        return view('activity.create');
    }

    public function store(StoreActivityRequest $request)
    {
        Category::create($request->all());
        
        return redirect()->route('admin.activity.index');
    }

    public function import(Request $request)
    {
        Excel::import(new CategoriesImport, $request->file);

        return redirect()->route('admin.activity.index');
    }
    public function gimport()
    {
        return view('activity.import');
    }
}
