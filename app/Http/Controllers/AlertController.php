<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class AlertController extends Controller {

    public function index(): void {
        // do something
    }

    public function getActiveAlert(): JsonResponse {
        $alert = Alert::where('active', 1)->first();

        if ($alert) {
            return response()->json($alert);
        }

        return response()->json(['message' => 'No active alerts'], 404);

    }

    public function showAllAlerts(): View {
        $alerts = Alert::all()->where('active', 0)->sortByDesc('created_at');
        return view('all-alerts', ['alerts' => $alerts]);
    }
}
