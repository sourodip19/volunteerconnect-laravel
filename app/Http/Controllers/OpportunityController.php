<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    
    public function show(Opportunity $opportunity)
{
    return view('opportunities.show', compact('opportunity'));
}


public function edit(Opportunity $opportunity)
{
    if ($opportunity->user_id !== Auth::user()->id) {
        abort(403, 'Unauthorized Access');
    }

    return view('opportunities.edit', compact('opportunity'));
}

public function update(Request $request, Opportunity $opportunity)
{
    if ($opportunity->user_id !== Auth::user()->id) {
    abort(403, 'Unauthorized Access');
}
    $request->validate([
        'title' => 'required',
        'category' => 'required',
        'location' => 'required',
        'date' => 'required',
        'required_volunteers' => 'required',
        'description' => 'required',
    ]);

    $opportunity->update([
        'title' => $request->title,
        'category' => $request->category,
        'location' => $request->location,
        'date' => $request->date,
        'required_volunteers' => $request->required_volunteers,
        'description' => $request->description,
    ]);

    return redirect()->route('opportunities.index');
}

public function destroy(Opportunity $opportunity)
{   
    if ($opportunity->user_id !== Auth::user()->id) {
    abort(403, 'Unauthorized Access');
}
    $opportunity->delete();

    return redirect()->route('opportunities.index');
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
            'user_id' => Auth::user()->id,
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