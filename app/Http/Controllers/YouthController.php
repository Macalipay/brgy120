<?php

namespace App\Http\Controllers;

use App\Youth;
use App\Street;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class YouthController extends Controller
{
    public function index()
    {
        $youths = Youth::orderBy('id', 'desc')->get();
        $streets = Street::orderBy('id')->get();
        return view('backend.pages.profiling.youth', compact('youths', 'streets'));
    }

    public function store(Request $request)
    {
        $youth = $request->validate([
            'firstname' => ['required', 'max:250'],
            'middlename' => ['required', 'max:250'],
            'lastname' => ['required', 'max:250'],
            'height' => ['required', 'max:250'],
            'weight' => ['required', 'max:250'],
            'gender' => ['required', 'max:250'],
            'solo_parent',
            'student',
            'street_id',
            'house_number',
            'lgbtqi',
            'lgbtqi_value',
            'birthday',
            'birthday_place',
            'contact',
            'marital_status',
            'email',
            'occupation',
            'religion',
            'spouse',
            'precinct_no',
            'tin',
            'philhealth',
            'pagibig',
            'sss',
            'residing_date',
            'contact_person',
            'contact_relation',
            'contact_number',
            'educational_attainment',
            'course',
            'skills',
            'income',
            'number_of_children',
            'mother_name',
            'father_name',
        ]);

        Youth::create($request->all());

        return redirect()->back()->with('register','Successfully Added');
    }

    public function edit($id)
    {
        $youths = Youth::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('youths'));
    }

    public function update(Request $request, $id)
    {
        Youth::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = Youth::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
