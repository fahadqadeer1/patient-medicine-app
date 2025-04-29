<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Show all medicines
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    // Show form to create new medicine
    public function create()
    {
        return view('medicines.create');
    }

    // Store a new medicine
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'frequency' => 'required|in:once,twice,thrice',
            'time_of_intake' => 'required|date_format:H:i',
            'for_infants' => 'required|boolean',
        ]);

        
        
        Medicine::create($request->all());

        return redirect()->route('medicines.index')->with('success', 'Medicine created successfully.');
    }

    // Show form to edit a medicine
    public function edit(Medicine $medicine)
    {
        return view('medicines.edit', compact('medicine'));
    }

    // Update the medicine
    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'frequency' => 'required|in:once,twice,thrice',
            'time_of_intake' => 'required|date_format:H:i:s',
            'for_infants' => 'required|boolean',
        ]);

        $medicine->update($request->all());

        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');
    }

    // Delete a medicine
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully.');
    }
}
