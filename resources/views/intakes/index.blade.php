@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">All Intakes</h2>
            <a href="{{ route('intakes.create') }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Add New Intake
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">Patient</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Medicine</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($intakes as $intake)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $intake->patient->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $intake->medicine->name }}</td>
                            <td class="px-6 py-4 text-sm">
                                <form action="{{ route('intakes.destroy', $intake->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this intake?');"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">No intakes found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
