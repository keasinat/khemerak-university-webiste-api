<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Debc\BusinessActivity\Models\Category;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $businessActivities = Category::count()->get();

        // return view('dashboard', compact(['businessActivities']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businessActivities = Category::count();

        return view('dashboard', compact('businessActivities'));
    }


}
