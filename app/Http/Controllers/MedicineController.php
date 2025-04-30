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
            'time_of_intake' => 'required|array',
            'time_of_intake.*' => 'in:08:00:00,14:00:00,20:00:00',
            'for_infants' => 'required|boolean',
        ]);

        

        Medicine::create([
            'name' => $request->name,
            'time_of_intake' => implode(',', $request->time_of_intake), // convert array to string
            'for_infants' => $request->for_infants,
        ]); 
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
            'time_of_intake' => 'required|array',
            'time_of_intake.*' => 'required|in:08:00:00,14:00:00,20:00:00',
            'for_infants' => 'required|boolean',
        ]);

        $medicine->update([
            'name' => $request->name,
            'time_of_intake' => implode(',', $request->time_of_intake),
            'for_infants' => $request->for_infants,
        ]);
        
        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');
    }

    // Delete a medicine
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully.');
    }
}
