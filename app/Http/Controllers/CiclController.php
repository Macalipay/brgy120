<?php

namespace App\Http\Controllers;

use App\Cicl;
use App\CaseType;
use App\Youth;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class CiclController extends Controller
{
    public function index()
    {
        $cicls = Cicl::orderBy('id', 'desc')->get();
        $case_types = CaseType::orderBy('id')->get();
        $youths = Youth::orderBy('id')->get();
        return view('backend.pages.cicl.cicl', compact('cicls', 'case_types', 'youths'));
    }

    public function store(Request $request)
    {
        $cicl = $request->validate([
            'youth_id' => ['required'],
            'case_id' => ['required'],
            'date_happen' => ['required'],
            'date_filed' => ['required'],
            'complainant' => ['required'],
            'remarks' => ['required'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);
        Cicl::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $cicls = Cicl::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('cicls'));
    }

    public function update(Request $request, $id)
    {
        Cicl::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = Cicl::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
