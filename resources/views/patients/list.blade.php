@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto p-6 mt-8 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Patients List</h1>

        <ul class="space-y-6">
            @forelse ($patients as $patient)
                <li class="border border-gray-200 rounded p-4 bg-gray-50">
                    <div class="text-lg font-semibold mb-2">{{ $patient->name }}</div>
                    <div class="ml-4">
                        <p class="text-sm font-medium mb-1 text-gray-700">Medicines:</p>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            @forelse ($patient->medicines as $medicine)
                                <li>
                                    {{ $medicine->name }} at 
                                    @foreach (explode(',', $medicine->time_of_intake) as $time)
                                        <span class="inline-block bg-gray-200 px-2 py-0.5 rounded text-xs text-gray-800">
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', trim($time))->format('g A') }}
                                        </span>
                                    @endforeach
                                </li>
                            @empty
                                <li class="text-gray-500">No medicines assigned.</li>
                            @endforelse
                        </ul>
                    </div>
                </li>
            @empty
                <li class="text-gray-500">No patients found.</li>
            @endforelse
        </ul>
    </div>
@endsection
