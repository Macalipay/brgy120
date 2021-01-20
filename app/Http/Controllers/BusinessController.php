<?php

namespace App\Http\Controllers;

use App\Business;
use App\Youth;
use App\Council;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = Business::orderBy('id', 'desc')->get();
        $youths = Youth::orderBy('id')->get();
        return view('backend.pages.certificate.business', compact('businesses', 'youths'));
    }

    public function template($id)
    {
        $data = Business::where('id', $id)->first();
        $chairman = Council::where('position', 'Barangay Chairman')->first();
        $secretary = Council::where('position', 'Secretary')->first();
        return view('backend.partials.certificate_template.business_template', compact('data', 'chairman', 'secretary'));
    }

    public function store(Request $request)
    {
        $businesses = $request->validate([
            'youth_id' => ['required', 'max:250'],
            'issued_date' => ['required', 'max:250'],
            'business_name' => ['required', 'max:250'],
            'business_location' => ['required', 'max:250'],
            'business_nature' => ['required', 'max:250'],
            'status' => ['required', 'max:250'],
        ]);

        $last_id = Business::orderBy('id', 'desc')->first();

        if ($last_id != null) {
            $code =  str_pad(($last_id->id + 1), 6, '0', STR_PAD_LEFT);
        } else {
            $code =  str_pad((1), 6, '0', STR_PAD_LEFT);
        }

        $request->request->add(['code' => 'B120BP-' . $code]);
        Business::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $businesses = Business::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('businesses'));
    }

    public function update(Request $request, $id)
    {
        Business::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = Business::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
