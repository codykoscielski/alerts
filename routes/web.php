<?php

use Illuminate\Support\Facades\Route;
use App\Models\Alert;

Route::view('/', 'welcome');

Route::get('dashboard', function(){
    $alert = Alert::where('active', 1)->get()->first();
    return view('dashboard', ['alert' => $alert]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
