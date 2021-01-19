<?php

namespace App\Http\Controllers;

use App\Street;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class StreetController extends Controller
{
    public function index()
    {
        $streets = Street::orderBy('id', 'desc')->get();
        return view('backend.pages.maintenance.street', compact('streets'));
    }

    public function store(Request $request)
    {
        $street = $request->validate([
            'street' => ['required', 'max:250', 'unique:streets'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);
        Street::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $streets = Street::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('streets'));
    }

    public function update(Request $request, $id)
    {
        Street::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = Street::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
