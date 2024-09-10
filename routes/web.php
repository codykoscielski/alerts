<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlertController;
use App\Models\Alert;

Route::view('/', 'welcome');

Route::get('alerts', function(){
    $alert = Alert::where('active', 1)->get()->first();
    return view('dashboard', ['alert' => $alert]);
})->middleware(['auth', 'verified'])->name('alerts');

Route::get('all-alerts', [AlertController::class, 'showAllAlerts'])
    ->middleware(['auth', 'verified'])->name('all-alerts');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
