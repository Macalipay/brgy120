<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('backend.pages.project.project', compact('projects'));
    }

    public function store(Request $request)
    {
        $project = $request->validate([
            'title' => ['required', 'max:250'],
            'description' => ['required', 'max:250'],
            'date_implemented' => ['required', 'max:250'],
            'location' => ['required', 'max:250'],
            'requirements' => ['required', 'max:250'],
            'registration' => ['required', 'max:250'],
            'date_time' => ['required', 'max:250'],
            'attendees' => ['required', 'max:250'],
            'lead_by' => ['required', 'max:250'],
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif',
            'status' => ['required', 'max:250'],
        ]);

        $file = $request->picture->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $imageName = $filename.time().'.'.$request->picture->extension();  
        $picture = $request->picture->move(public_path('images/project'), $imageName);

        $requestData = $request->all();
        $requestData['picture'] = $imageName;

        Project::create($requestData);

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $projects = Project::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('projects'));
    }

    public function update(Request $request, $id)
    {
        $project = $request->validate([
            'title' => ['required', 'max:250'],
            'description' => ['required', 'max:250'],
            'date_implemented' => ['required', 'max:250'],
            'location' => ['required', 'max:250'],
            'requirements' => ['required', 'max:250'],
            'registration' => ['required', 'max:250'],
            'date_time' => ['required', 'max:250'],
            'attendees' => ['required', 'max:250'],
            'lead_by' => ['required', 'max:250'],
            'picture' => 'image|mimes:jpeg,png,jpg,gif',
            'status' => ['required', 'max:250'],
        ]);

        if($request->picture == null) {
            Project::find($id)->update($request->all());
        } else {
            $file = $request->picture->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
    
            $imageName = $filename.time().'.'.$request->picture->extension();  
            $picture = $request->picture->move(public_path('images/project'), $imageName);
    
            $requestData = $request->all();
            $requestData['picture'] = $imageName;
            
            Project::find($id)->update($requestData);
        }
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = Project::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
