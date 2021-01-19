<?php

namespace App\Http\Controllers;

use App\PWD;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class PwdController extends Controller
{
    public function index()
    {
        $pwds = PWD::orderBy('id', 'desc')->get();
        return view('backend.pages.maintenance.pwd', compact('pwds'));
    }

    public function store(Request $request)
    {
        $pwd = $request->validate([
            'pwd' => ['required', 'max:250', 'unique:pwds'],
            'description' => ['required', 'max:250'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);
        PWD::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $pwds = PWD::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('pwds'));
    }

    public function update(Request $request, $id)
    {
        PWD::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = PWD::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
