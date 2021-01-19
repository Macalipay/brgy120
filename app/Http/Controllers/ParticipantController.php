<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::orderBy('id', 'desc')->get();
        return view('backend.pages.participant.participant', compact('participants'));
    }

    public function store(Request $request)
    {
        $project = $request->validate([
            'project_id' => ['required', 'max:250'],
            'participants' => ['required', 'max:250'],
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $file = $request->picture->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $imageName = $filename.time().'.'.$request->picture->extension();  
        $picture = $request->picture->move(public_path('images/participant'), $imageName);

        $requestData = $request->all();
        $requestData['picture'] = $imageName;

        Participant::create($requestData);

        return redirect()->back()->with('participant','Join Succesfuly');
    }

    public function edit($id)
    {
        $participants = Participant::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('participants'));
    }

    public function update(Request $request, $id)
    {
        Participant::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $barangay_destroy = Participant::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
