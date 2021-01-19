<?php

namespace App\Http\Controllers;

use App\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::orderBy('id', 'desc')->get();
        return view('backend.pages.suggestion.suggestion', compact('suggestions'));
    }

    public function store(Request $request)
    {
        $suggestion = $request->validate([
            'name' => ['required', 'max:250'],
            'suggestion' => ['required', 'max:750'],
        ]);

        Suggestion::create($request->all());

        return redirect()->back()->with('suggestion','Successfully Sent');
    }

    public function destroy($id)
    {
        $barangay_destroy = Suggestion::find($id);
        $barangay_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
