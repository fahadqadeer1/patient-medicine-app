@extends('layouts.app')

@section('content')
    <h2>All Intakes</h2>
    <a href="{{ route('intakes.create') }}">Add New Intake</a>

    <ul>
        @foreach ($intakes as $intake)
            <li>
                Patient: {{ $intake->patient->name }} | 
                Medicine: {{ $intake->medicine->name }} 
                <form action="{{ route('intakes.destroy', $intake->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
