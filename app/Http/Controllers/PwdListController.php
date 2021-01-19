<?php

namespace App\Http\Controllers;

use App\PwdList;
use App\Youth;
use App\Pwd;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

class PwdListController extends Controller
{
    public function index()
    {
        $pwd_lists = PwdList::orderBy('id', 'desc')->get();
        $youths = Youth::orderBy('id')->get();
        $pwds = Pwd::orderBy('id')->get();
        return view('backend.pages.pwd.pwd_list', compact('pwd_lists', 'pwds', 'youths'));
    }

    public function store(Request $request)
    {
        $pwd_list = $request->validate([
            'youth_id' => ['required'],
            'pwd_id' => ['required'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);
        PwdList::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $pwd_lists = PwdList::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('pwd_lists'));
    }

    public function update(Request $request, $id)
    {
        PwdList::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = PwdList::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
