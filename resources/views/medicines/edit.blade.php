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
    <h2>Edit Medicine</h2>
    <form method="POST" action="{{ route('medicines.update', $medicine->id) }}">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ $medicine->name }}" required>

        <label>Frequency:</label>
        <select name="frequency" required>
            <option value="once" {{ $medicine->frequency == 'once' ? 'selected' : '' }}>Once</option>
            <option value="twice" {{ $medicine->frequency == 'twice' ? 'selected' : '' }}>Twice</option>
            <option value="thrice" {{ $medicine->frequency == 'thrice' ? 'selected' : '' }}>Thrice</option>
        </select>

        <label>Time of Intake (HH:MM:SS):</label>
        <input type="time" name="time_of_intake" value="{{ $medicine->time_of_intake }}" required>

        <label>For Infants:</label>
        <select name="for_infants" required>
            <option value="1" {{ $medicine->for_infants ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !$medicine->for_infants ? 'selected' : '' }}>No</option>
        </select>

        <button type="submit">Update</button>
    </form>
@endsection
