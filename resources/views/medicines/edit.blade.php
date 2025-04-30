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

    <label>Time of Intake:</label><br>
    @php
        $selectedTimes = explode(',', $medicine->time_of_intake);
    @endphp

    <label>
        <input type="checkbox" name="time_of_intake[]" value="08:00:00"
            {{ in_array('08:00:00', $selectedTimes) ? 'checked' : '' }}>
        8 AM
    </label><br>

    <label>
        <input type="checkbox" name="time_of_intake[]" value="14:00:00"
            {{ in_array('14:00:00', $selectedTimes) ? 'checked' : '' }}>
        2 PM
    </label><br>

    <label>
        <input type="checkbox" name="time_of_intake[]" value="20:00:00"
            {{ in_array('20:00:00', $selectedTimes) ? 'checked' : '' }}>
        8 PM
    </label><br>

    <label>For Infants:</label>
    <select name="for_infants" required>
        <option value="1" {{ $medicine->for_infants ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ !$medicine->for_infants ? 'selected' : '' }}>No</option>
    </select>

    <button type="submit">Update</button>
</form>
@endsection
