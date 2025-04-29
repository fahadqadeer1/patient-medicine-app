<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;

class PatientApiController extends Controller
{
    // Female adult patients with 8PM medicines
    public function femaleAdults()
    {
        $patients = Patient::where('gender', 'female')
            ->where('type', 'adult')
            ->with(['medicines' => function ($query) {
                $query->where('time_of_intake', '20:00:00');
            }])
            ->get();

        return response()->json($patients);
    }

    // Male infant patients with 8AM medicines
    public function maleInfants()
    {
        $patients = Patient::where('gender', 'male')
            ->where('type', 'infant')
            ->with(['medicines' => function ($query) {
                $query->where('time_of_intake', '08:00:00');
            }])
            ->get();

        return response()->json($patients);
    }
}
