<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ApplicationController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::resource('opportunities', OpportunityController::class)
        ->only(['index', 'show']);

});


Route::middleware(['auth', 'role:volunteer'])->group(function () {

    Route::get('/volunteer/dashboard', function () {
        return view('volunteer.dashboard');
    })->name('volunteer.dashboard');
    Route::post('/opportunities/{opportunity}/apply',
    [ApplicationController::class, 'store'])
    ->name('applications.store');

});

Route::middleware(['auth', 'role:organization'])->group(function () {

    Route::get('/organization/dashboard', function () {
        return view('organization.dashboard');
    })->name('organization.dashboard');

    Route::resource('opportunities', OpportunityController::class)
    ->except(['index', 'show']);

    Route::patch('/applications/{application}/accept',
    [ApplicationController::class, 'accept'])
    ->name('applications.accept');

Route::patch('/applications/{application}/reject',
    [ApplicationController::class, 'reject'])
    ->name('applications.reject');

});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
