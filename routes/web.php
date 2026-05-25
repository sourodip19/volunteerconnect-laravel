<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ApplicationController;


/*
|--------------------------------------------------------------------------
| Organization Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:organization'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Organization Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/organization/dashboard', function () {

        $opportunities = \App\Models\Opportunity::where(
            'user_id',
            Auth::id()
        );

        $totalOpportunities = $opportunities->count();

        $opportunityIds = $opportunities->pluck('id');

        $totalApplicants = \App\Models\Application::whereIn(
    'opportunity_id',
    $opportunityIds
)->count();

$acceptedApplicants = \App\Models\Application::whereIn(
    'opportunity_id',
    $opportunityIds
)->where('status', 'accepted')->count();

$pendingApplicants = \App\Models\Application::whereIn(
    'opportunity_id',
    $opportunityIds
)->where('status', 'pending')->count();

        return view('organization.dashboard', compact(
            'totalOpportunities',
            'totalApplicants',
            'acceptedApplicants',
            'pendingApplicants'
        ));

    })->name('organization.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Opportunity Management
    |--------------------------------------------------------------------------
    */

    Route::get('/opportunities/create',
        [OpportunityController::class, 'create'])
        ->name('opportunities.create');

    Route::post('/opportunities',
        [OpportunityController::class, 'store'])
        ->name('opportunities.store');

    Route::get('/opportunities/{opportunity}/edit',
        [OpportunityController::class, 'edit'])
        ->name('opportunities.edit');

    Route::put('/opportunities/{opportunity}',
        [OpportunityController::class, 'update'])
        ->name('opportunities.update');

    Route::delete('/opportunities/{opportunity}',
        [OpportunityController::class, 'destroy'])
        ->name('opportunities.destroy');

    /*
    |--------------------------------------------------------------------------
    | Application Management
    |--------------------------------------------------------------------------
    */

    Route::patch('/applications/{application}/accept',
        [ApplicationController::class, 'accept'])
        ->name('applications.accept');

    Route::patch('/applications/{application}/reject',
        [ApplicationController::class, 'reject'])
        ->name('applications.reject');

});



/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Shared Auth Routes
|--------------------------------------------------------------------------
| Accessible by all logged-in users
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/opportunities',
        [OpportunityController::class, 'index'])
        ->name('opportunities.index');

    Route::get('/opportunities/{opportunity}',
        [OpportunityController::class, 'show'])
        ->name('opportunities.show');

});

/*
|--------------------------------------------------------------------------
| Volunteer Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:volunteer'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Volunteer Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/volunteer/dashboard', function () {

        $totalApplications = \App\Models\Application::where(
    'user_id',
    Auth::id()
)->count();

$acceptedApplications = \App\Models\Application::where(
    'user_id',
    Auth::id()
)->where('status', 'accepted')->count();

$pendingApplications = \App\Models\Application::where(
    'user_id',
    Auth::id()
)->where('status', 'pending')->count();

$rejectedApplications = \App\Models\Application::where(
    'user_id',
    Auth::id()
)->where('status', 'rejected')->count();

        return view('volunteer.dashboard', compact(
            'totalApplications',
            'acceptedApplications',
            'pendingApplications',
            'rejectedApplications'
        ));

    })->name('volunteer.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Volunteer Applications
    |--------------------------------------------------------------------------
    */

    Route::post('/opportunities/{opportunity}/apply',
        [ApplicationController::class, 'store'])
        ->name('applications.store');

    Route::get('/my-applications',
        [ApplicationController::class, 'index'])
        ->name('applications.index');

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile',
        [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';