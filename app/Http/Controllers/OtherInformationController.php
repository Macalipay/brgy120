<?php

namespace App\Http\Controllers;

use App\OtherInformation;
use App\Youth;
use Illuminate\Http\Request;
use Input;


class OtherInformationController extends Controller
{
    public function index()
    {
        $informations = OtherInformation::orderBy('id', 'desc')->get();
        $youths = Youth::orderBy('id', 'desc')->get();
        return view('backend.pages.profiling.other_information', compact('informations', 'youths'));
    }

    public function store(Request $request)
    {
        $information = $request->validate([
            'youth_id' => 'required',
            'picture' => 'required|mimes:jpeg,png,jpg,gif',
            'signature' => 'required|mimes:jpeg,png,jpg,gif',
            'right_thumb' => 'required|mimes:jpeg,png,jpg,gif',
            'left_thumb' => 'required|mimes:jpeg,png,jpg,gif',
        ]);

        $file = $request->picture->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $imageName = $filename.time().'.'.$request->picture->extension();  
        $picture = $request->picture->move(public_path('images/other'), $imageName);

        $file2 = $request->signature->getClientOriginalName();
        $filename2 = pathinfo($file2, PATHINFO_FILENAME);
        $imageName2 = $filename2.time().'.'.$request->signature->extension();  
        $signature = $request->signature->move(public_path('images/other'), $imageName2);

        $file3 = $request->right_thumb->getClientOriginalName();
        $filename3 = pathinfo($file3, PATHINFO_FILENAME);
        $imageName3 = $filename3.time().'.'.$request->right_thumb->extension();  
        $right_thumb = $request->right_thumb->move(public_path('images/other'), $imageName3);

        $file4 = $request->left_thumb->getClientOriginalName();
        $filename4 = pathinfo($file4, PATHINFO_FILENAME);
        $imageName4 = $filename4.time().'.'.$request->left_thumb->extension();  
        $left_thumb = $request->left_thumb->move(public_path('images/other'), $imageName4);

        $requestData = $request->all();
        $requestData['picture'] = $imageName;
        $requestData['signature'] = $imageName2;
        $requestData['right_thumb'] = $imageName3;
        $requestData['left_thumb'] = $imageName4;

        OtherInformation::create($requestData);

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $informations = OtherInformation::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('informations'));
    }

    public function update(Request $request, $id)
    {
        if($request->picture != null) {
            $file = $request->picture->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $imageName = $filename.time().'.'.$request->picture->extension();  
            $picture = $request->picture->move(public_path('images/other'), $imageName);
        $requestData = $request->all();

            $requestData['picture'] = $imageName;
        }

        if($request->signature != null) {
            $file2 = $request->signature->getClientOriginalName();
            $filename2 = pathinfo($file2, PATHINFO_FILENAME);
            $imageName2 = $filename2.time().'.'.$request->signature->extension();  
            $signature = $request->signature->move(public_path('images/other'), $imageName2);
        $requestData = $request->all();

            $requestData['signature'] = $imageName2;
        }

        if($request->right_thumb != null) {
            $file3 = $request->right_thumb->getClientOriginalName();
            $filename3 = pathinfo($file3, PATHINFO_FILENAME);
            $imageName3 = $filename3.time().'.'.$request->right_thumb->extension();  
            $right_thumb = $request->right_thumb->move(public_path('images/other'), $imageName3);
        $requestData = $request->all();

            $requestData['right_thumb'] = $imageName3;
        }

        if($request->left_thumb != null) {
            $file4 = $request->left_thumb->getClientOriginalName();
            $filename4 = pathinfo($file4, PATHINFO_FILENAME);
            $imageName4 = $filename4.time().'.'.$request->left_thumb->extension();  
            $left_thumb = $request->left_thumb->move(public_path('images/other'), $imageName4);
        $requestData = $request->all();

            $requestData['left_thumb'] = $imageName4;
        }

        OtherInformation::find($id)->update($requestData);
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $information = OtherInformation::find($id);
        $information->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
