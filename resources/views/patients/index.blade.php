@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
            <h2 class="text-2xl font-semibold text-gray-800">Patients</h2>
            <a href="{{ route('patients.create') }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Add New Patient
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($patients as $patient)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $patient->name }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('patients.edit', $patient->id) }}"
                                   class="text-blue-600 hover:underline text-sm">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-center text-gray-500">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
