<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\JsonResponse;

class AvailabilityController extends Controller
{
    public function checkAvailability(): JsonResponse
    {
        $unavailableWeeks = Trip::getUnavailableWeeks();
        
        return response()->json([
            'unavailable_weeks' => $unavailableWeeks,
            'message' => 'Availability data retrieved successfully'
        ]);
    }
}