@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Patient</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('patients.update', $patient->id) }}">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ $patient->name }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Gender Field -->
            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="gender" name="gender"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <!-- Type Field -->
            <div class="mb-6">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <select id="type" name="type"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="infant" {{ $patient->type == 'infant' ? 'selected' : '' }}>Infant</option>
                    <option value="adult" {{ $patient->type == 'adult' ? 'selected' : '' }}>Adult</option>
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
