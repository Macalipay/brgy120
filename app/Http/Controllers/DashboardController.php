<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Youth;
use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = Youth::orderBy('id')->get();
        $street_counts = Youth::select('street_id', DB::raw('count(*) as total'))->groupBy('street_id')->orderBy('total', 'desc')->get();
        $total = count($residents);

        return view('backend.pages.dashboard.dashboard', compact('residents' ,'street_counts', 'total'));
    }

    public function data()
    {
        $male = Youth::where('gender', 'Male')->count();
        $female = Youth::where('gender', 'Female')->count();
        return response()->json(compact('male', 'female'));
    }
}
