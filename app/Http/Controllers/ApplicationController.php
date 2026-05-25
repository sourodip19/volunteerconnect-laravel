<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
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
public function generateCertificate(Application $application)
{
    // Only accepted volunteers can receive certificates

    if ($application->status !== 'accepted') {

        abort(403, 'Certificate cannot be issued.');

    }

    // Mark certificate as issued

    $application->certificate_issued = true;

    $application->save();

    return back()->with(
        'success',
        'Certificate issued successfully.'
    );
}
public function certificates()
{
    $applications = Application::where(
        'user_id',
        auth()->id()
    )->where(
        'certificate_issued',
        true
    )->get();

    return view(
        'applications.certificates',
        compact('applications')
    );
}
public function downloadCertificate(Application $application)
{
    // Security check

    if ($application->user_id !== auth()->id()) {

        abort(403);

    }

    if (!$application->certificate_issued) {

        abort(403);

    }

    $pdf = Pdf::loadView('certificates.certificate', [
        'application' => $application
    ]);

    return $pdf->download(
        $application->user->name . '-certificate.pdf'
    );
}
}