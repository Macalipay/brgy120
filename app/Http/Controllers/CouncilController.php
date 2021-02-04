<?php

namespace App\Http\Controllers;

use App\Council;
use Illuminate\Http\Request;
use Input;
class CouncilController extends Controller
{
    public function index()
    {
        $councils = Council::orderBy('id', 'desc')->get();
        return view('backend.pages.council.council', compact('councils'));
    }

    public function store(Request $request)
    {
        $council = $request->validate([
            'firstname' => ['required', 'max:250'],
            'middlename' => ['required', 'max:250'],
            'lastname' => ['required', 'max:250'],
            'position' => ['required', 'max:250'],
            'message' => ['required', 'max:600'],
            'picture' => 'required|mimes:jpeg,png,jpg,gif',
        ]);

        $file = $request->picture->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $imageName = $filename.time().'.'.$request->picture->extension();  
        $picture = $request->picture->move(public_path('images/council'), $imageName);

        $requestData = $request->all();
        $requestData['picture'] = $imageName;

        Council::create($requestData);

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $councils = Council::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('councils'));
    }

    public function update(Request $request, $id)
    {
        if($request->picture == null) {
            Council::find($id)->update($request->all());
        } else {
            $file = $request->picture->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
    
            $imageName = $filename.time().'.'.$request->picture->extension();  
            $picture = $request->picture->move(public_path('images/project'), $imageName);
    
            $requestData = $request->all();
            $requestData['picture'] = $imageName;
            
            Council::find($id)->update($requestData);
        }
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = Council::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
