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

        <label>Time of Intake:</label><br>

        <label>
            <input type="checkbox" name="time_of_intake[]" value="08:00:00">
            8 AM
        </label><br>

        <label>
            <input type="checkbox" name="time_of_intake[]" value="14:00:00">
            2 PM
        </label><br>

        <label>
            <input type="checkbox" name="time_of_intake[]" value="20:00:00">
            8 PM
        </label><br>


        <label>For Infants:</label>
        <select name="for_infants" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>

        <button type="submit">Save</button>
    </form>
@endsection
