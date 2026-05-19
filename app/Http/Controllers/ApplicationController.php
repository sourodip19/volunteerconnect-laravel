<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Opportunity $opportunity)
    {
        $alreadyApplied = Application::where('user_id', auth()->user()->id)
            ->where('opportunity_id', $opportunity->id)
            ->exists();

        if ($alreadyApplied) {
            return back()->with('error', 'You already applied.');
        }

        Application::create([
            'user_id' => auth()->user()->id,
            'opportunity_id' => $opportunity->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }
}