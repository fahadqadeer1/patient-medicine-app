<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Intake;

class PatientController extends Controller
{
    
    // Show all patients
    public function index()
    {
//        if (auth()->user()->role !== 'admin') {
//            abort(403, 'Unauthorized');
//        }
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // Show form to create a new patient
    public function create()
    {
        return view('patients.create');
    }

    // Save new patient to database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'type' => 'required|in:infant,adult',
        ]);

        Patient::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'type' => $request->type,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    // Show form to edit a patient
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // Update patient in database
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'type' => 'required|in:infant,adult',
        ]);

        $patient->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'type' => $request->type,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    // Delete a patient
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }

    // List female adult patients for 8PM intake
    public function listFemaleAdults()
    {
        $patients = Patient::where('gender', 'female')
            ->where('type', 'adult')
            ->with(['medicines' => function ($query) {
                $query->where('time_of_intake', '20:00:00'); // 8 PM
            }])
            ->get();

        return view('patients.list', compact('patients'));
    }

    // List male infant patients for 8AM intake
    public function listMaleInfants()
    {
        $patients = Patient::where('gender', 'male')
            ->where('type', 'infant')
            ->with(['medicines' => function ($query) {
                $query->where('time_of_intake', '08:00:00'); // 8 AM
            }])
            ->get();

        return view('patients.list', compact('patients'));
    }
    

    
}
