<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Youth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $residents = Youth::orderBy('id')->get();
        $street_counts = Youth::select('street_id', DB::raw('count(*) as total'))->groupBy('street_id')->orderBy('total', 'desc')->get();
        $total = count($residents);

        return view('backend.pages.dashboard.dashboard', compact('residents' ,'street_counts', 'total'));
    }
}
