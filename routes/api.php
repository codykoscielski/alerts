<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlertController;

Route::get('/active-alert', [AlertController::class, 'getActiveAlert']);