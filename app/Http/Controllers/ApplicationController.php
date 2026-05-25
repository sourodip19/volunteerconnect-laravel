<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ApplicationController extends Controller
{
    public function store(Opportunity $opportunity)
    {
        $alreadyApplied = Application::where('user_id', Auth::user()->id)
            ->where('opportunity_id', $opportunity->id)
            ->exists();

        if ($alreadyApplied) {
            return back()->with('error', 'You already applied.');
        }

        Application::create([
            'user_id' => Auth::user()->id,
            'opportunity_id' => $opportunity->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }
    public function accept(Application $application)
{
    $application->update([
        'status' => 'accepted'
    ]);

    return back();
}

public function reject(Application $application)
{
    $application->update([
        'status' => 'rejected'
    ]);

    return back();
}
public function index()
{
    $applications = Application::where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('applications.index', compact('applications'));
}
}