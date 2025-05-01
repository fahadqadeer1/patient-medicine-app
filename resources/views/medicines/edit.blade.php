@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Medicine</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('medicines.update', $medicine->id) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $medicine->name }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Time of Intake -->
            @php
                $selectedTimes = explode(',', $medicine->time_of_intake);
            @endphp

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Time of Intake</label>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="time_of_intake[]" value="08:00:00"
                               {{ in_array('08:00:00', $selectedTimes) ? 'checked' : '' }}
                               class="form-checkbox text-blue-600 rounded mr-2">
                        8 AM
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="time_of_intake[]" value="14:00:00"
                               {{ in_array('14:00:00', $selectedTimes) ? 'checked' : '' }}
                               class="form-checkbox text-blue-600 rounded mr-2">
                        2 PM
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="time_of_intake[]" value="20:00:00"
                               {{ in_array('20:00:00', $selectedTimes) ? 'checked' : '' }}
                               class="form-checkbox text-blue-600 rounded mr-2">
                        8 PM
                    </label>
                </div>
            </div>

            <!-- For Infants -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700" for="for_infants">For Infants</label>
                <select name="for_infants" id="for_infants" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="1" {{ $medicine->for_infants ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$medicine->for_infants ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
