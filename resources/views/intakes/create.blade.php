@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Assign Medicine to Patient</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('intakes.store') }}">
            @csrf

            <!-- Select Patient -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="patient_id">Select Patient</label>
                <select name="patient_id" id="patient_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Select Medicine -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700" for="medicine_id">Select Medicine</label>
                <select name="medicine_id" id="medicine_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach($medicines as $medicine)
                        <option value="{{ $medicine->id }}">
                            {{ $medicine->name }} ({{ implode(' | ', array_map(fn($t) => \Carbon\Carbon::createFromFormat('H:i:s', trim($t))->format('g A'), explode(',', $medicine->time_of_intake)) ) }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                    Assign
                </button>
            </div>
        </form>
    </div>
@endsection
