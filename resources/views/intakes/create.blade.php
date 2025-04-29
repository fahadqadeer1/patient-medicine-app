@extends('layouts.app')
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
    <h2>Assign Medicine to Patient (New Intake)</h2>

    <form method="POST" action="{{ route('intakes.store') }}">
        @csrf

        <label>Select Patient:</label>
        <select name="patient_id" required>
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>

        <label>Select Medicine:</label>
        <select name="medicine_id" required>
            @foreach($medicines as $medicine)
                <option value="{{ $medicine->id }}">{{ $medicine->name }} ({{ $medicine->time_of_intake }})</option>
            @endforeach
        </select>

        <button type="submit">Assign</button>
    </form>
@endsection
