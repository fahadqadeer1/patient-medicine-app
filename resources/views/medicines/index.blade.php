@extends('layouts.app')

@section('content')
    <h2>Medicines</h2>
    <a href="{{ route('medicines.create') }}">Add New Medicine</a>
    <ul>
        @foreach ($medicines as $medicine)
            <li>{{ $medicine->name }} ({{ $medicine->frequency }}) at {{ $medicine->time_of_intake }} 
                [Infant allowed: {{ $medicine->for_infants ? 'Yes' : 'No' }}] 
                - <a href="{{ route('medicines.edit', $medicine->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection
