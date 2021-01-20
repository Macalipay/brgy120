<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Youth;
use App\Street;
use App\Cicl;
use App\PwdList;
use App\Pwd;
use App\CaseType;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resident()
    {
        $youths = Youth::orderBy('id', 'desc')->get();
        $streets = Street::orderBy('id')->get();
        return view('backend.pages.report.resident_report', compact('youths', 'streets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blotter()
    {
        $cicls = Cicl::orderBy('id', 'desc')->get();
        $case_types = CaseType::orderBy('id')->get();
        $youths = Youth::orderBy('id')->get();
        return view('backend.pages.report.blotter_report', compact('cicls', 'case_types', 'youths'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pwd()
    {
        $pwd_lists = PwdList::orderBy('id', 'desc')->get();
        $youths = Youth::orderBy('id')->get();
        $pwds = Pwd::orderBy('id')->get();
        return view('backend.pages.report.pwd_report', compact('pwd_lists', 'pwds', 'youths'));
    }


    public function lgbtqi()
    {
        $youths = Youth::where('lgbtqi', 'on')->orderBy('id', 'desc')->get();
        $streets = Street::orderBy('id')->get();
        return view('backend.pages.report.lgbtqi_report', compact('youths', 'streets'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
