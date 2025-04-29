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
    <h2>Add New Medicine</h2>
    <form method="POST" action="{{ route('medicines.store') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Frequency:</label>
        <select name="frequency" required>
            <option value="once">Once</option>
            <option value="twice">Twice</option>
            <option value="thrice">Thrice</option>
        </select>

        <label>Time of Intake (HH:MM:SS):</label>
        <input type="time" name="time_of_intake" required>

        <label>For Infants:</label>
        <select name="for_infants" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>

        <button type="submit">Save</button>
    </form>
@endsection
