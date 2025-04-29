<?php

namespace App\Http\Controllers;

use App\Models\Intake;
use App\Models\Patient;
use App\Models\Medicine;
use Illuminate\Http\Request;

class IntakeController extends Controller
{
    // Show all intakes
    public function index()
    {
        $intakes = Intake::with(['patient', 'medicine'])->get();
        return view('intakes.index', compact('intakes'));
    }

    // Show form to create new intake
    public function create()
    {
        $patients = Patient::all();
        $medicines = Medicine::all();
        return view('intakes.create', compact('patients', 'medicines'));
    }

    // Store a new intake
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medicine_id' => 'required|exists:medicines,id',
        ]);
        
        
        Intake::create($request->all());

        return redirect()->route('intakes.index')->with('success', 'Intake created successfully.');
    }

    // Delete an intake
    public function destroy(Intake $intake)
    {
        $intake->delete();

        return redirect()->route('intakes.index')->with('success', 'Intake deleted successfully.');
    }
}
