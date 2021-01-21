<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Council;
use App\Youth;
use Illuminate\Http\Request;
use PDF;

class CertificateController extends Controller
{
    public function index()
    {
        $certifications = Certificate::orderBy('id', 'desc')->get();
        $youths = Youth::orderBy('id')->get();
        return view('backend.pages.certificate.certification', compact('certifications', 'youths'));
    }

    public function template($id)
    {
        $data = Certificate::where('id', $id)->first();
        $chairman = Council::where('position', 'Barangay Chairman')->first();
        $secretary = Council::where('position', 'Secretary')->first();
        return view('backend.partials.certificate_template.certification_template', compact('data', 'chairman', 'secretary'));
    }

    public function store(Request $request)
    {
        $certification = $request->validate([
            'youth_id' => ['required', 'max:250'],
            'issued_date' => ['required', 'max:250'],
            'purpose' => ['required', 'max:250'],
        ]);

        $last_id = Certificate::orderBy('id', 'desc')->first();

        if ($last_id != null) {
            $code =  str_pad(($last_id->id + 1), 6, '0', STR_PAD_LEFT);
        } else {
            $code =  str_pad((1), 6, '0', STR_PAD_LEFT);
        }

        $request->request->add(['code' => 'B120C-' . $code]);
        Certificate::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $certifications = Certificate::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('certifications'));
    }

    public function update(Request $request, $id)
    {
        Certificate::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = Certificate::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
