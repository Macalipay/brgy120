<?php

namespace App\Http\Controllers;

use App\CaseType;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class CaseTypeController extends Controller
{
    public function index()
    {
        $case_types = CaseType::orderBy('id')->get();
        return view('backend.pages.maintenance.case_type', compact('case_types'));
    }

    public function store(Request $request)
    {
        $case_type = $request->validate([
            'case' => ['required', 'max:250', 'unique:case_types'],
            'description' => ['required', 'max:250'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);
        CaseType::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $case_types = CaseType::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('case_types'));
    }

    public function update(Request $request, $id)
    {
        CaseType::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = CaseType::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
