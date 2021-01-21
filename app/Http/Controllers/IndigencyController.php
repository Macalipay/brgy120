<?php

namespace App\Http\Controllers;

use App\Indigency;
use App\Youth;
use App\Council;
use Illuminate\Http\Request;

class IndigencyController extends Controller
{
    public function index()
    {
        $indigencys = Indigency::orderBy('id', 'desc')->get();
        $youths = Youth::orderBy('id')->get();
        return view('backend.pages.certificate.indigency', compact('indigencys', 'youths'));
    }

    public function template($id)
    {
        $data = Indigency::where('id', $id)->first();
        $chairman = Council::where('position', 'Barangay Chairman')->first();
        $secretary = Council::where('position', 'Secretary')->first();
        return view('backend.partials.certificate_template.indigency_template', compact('data', 'chairman', 'secretary'));
    }

    public function store(Request $request)
    {
        $indigency = $request->validate([
            'youth_id' => ['required', 'max:250'],
            'issued_date' => ['required', 'max:250'],
            'purpose' => ['required', 'max:250'],
        ]);

        $last_id = Indigency::orderBy('id', 'desc')->first();

        if ($last_id != null) {
            $code =  str_pad(($last_id->id + 1), 6, '0', STR_PAD_LEFT);
        } else {
            $code =  str_pad((1), 6, '0', STR_PAD_LEFT);
        }

        $request->request->add(['code' => 'B120CI-' . $code]);
        Indigency::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $indigencys = Indigency::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('indigencys'));
    }

    public function update(Request $request, $id)
    {
        Indigency::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = Indigency::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
