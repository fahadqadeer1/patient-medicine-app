@extends('layouts.app')

@section('content')
    <h2>Patients</h2>
    <a href="{{ route('patients.create') }}">Add New Patient</a>
    <ul>
        @foreach ($patients as $patient)
            <li>{{ $patient->name }} - <a href="{{ route('patients.edit', $patient->id) }}">Edit</a></li>
        @endforeach
    </ul>
@endsection
