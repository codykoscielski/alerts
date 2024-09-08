<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\JsonResponse;
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
}
