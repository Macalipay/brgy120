<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Council;
use App\Project;
use App\Street;
use App\Seminar;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streets = Street::orderBy('id')->get();
        $councils = Council::orderBy('id')->get();
        $projects = Project::where('status', 'Done')->orderBy('id')->get();
        $upcomings = Project::where('status', 'Upcoming')->orderBy('id')->get();
        $upcoming = Project::where('status', 'Upcoming')->orderBy('date_implemented')->first();
        $sk = Council::where('position', 'Chairperson')->first();
        $seminars = Seminar::where('status', 'active')->get();
        return view('frontend.master.template', compact('councils', 'projects', 'upcomings', 'upcoming', 'sk', 'streets', 'seminars'));
    }

    public function show($id)
    {
        $upcoming = Project::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('upcoming'));
    }
}
