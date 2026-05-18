<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::latest()->get();

return view('opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        return view('opportunities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'location' => 'required',
            'date' => 'required',
            'required_volunteers' => 'required',
            'description' => 'required',
        ]);

        Opportunity::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'category' => $request->category,
            'location' => $request->location,
            'date' => $request->date,
            'required_volunteers' => $request->required_volunteers,
            'description' => $request->description,
        ]);

        return redirect()->route('opportunities.index');
    }
}