<?php

namespace App\Http\Controllers;

use App\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::orderBy('id', 'desc')->get();
        return view('backend.pages.seminar.seminar', compact('seminars'));
    }

    public function store(Request $request)
    {
        $seminar = $request->validate([
            'title' => ['required', 'max:250'],
            'description' => ['required', 'max:250'],
            'type' => ['required', 'max:250'],
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif',
            'status' => ['required', 'max:250'],
        ]);

        $file = $request->picture->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $imageName = $filename.time().'.'.$request->picture->extension();  
        $picture = $request->picture->move(public_path('images/seminar'), $imageName);

        $requestData = $request->all();
        $requestData['picture'] = $imageName;

        Seminar::create($requestData);

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $seminars = Seminar::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('seminars'));
    }

    public function update(Request $request, $id)
    {
        if($request->picture == null) {
            Seminar::find($id)->update($request->all());
        } else {
            $file = $request->picture->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
    
            $imageName = $filename.time().'.'.$request->picture->extension();  
            $picture = $request->picture->move(public_path('images/project'), $imageName);
    
            $requestData = $request->all();
            $requestData['picture'] = $imageName;
            
            Seminar::find($id)->update($requestData);
        }
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = Seminar::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
