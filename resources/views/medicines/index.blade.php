@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Medicines</h2>
            <a href="{{ route('medicines.create') }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Add New Medicine
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Times of Intake</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Infant Allowed</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($medicines as $medicine)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $medicine->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 space-x-2">
                                @foreach (explode(',', $medicine->time_of_intake) as $time)
                                    <span class="inline-block bg-gray-200 px-2 py-1 rounded text-xs">
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', trim($time))->format('g A') }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800">
                                {{ $medicine->for_infants ? 'Yes' : 'No' }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('medicines.edit', $medicine->id) }}"
                                   class="text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No medicines found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
