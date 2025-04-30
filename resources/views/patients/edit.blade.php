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
<h2>Edit Patient</h2>
<form method="POST" action="{{ route('patients.update', $patient->id) }}">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $patient->name }}" required>

    <!-- Gender Field -->
    <label for="gender">Gender:</label>
    <select id="gender" name="gender">
        <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female</option>
    </select>

    <!-- Type Field -->
    <label for="type">Type:</label>
    <select id="type" name="type">
        <option value="infant" {{ $patient->type == 'infant' ? 'selected' : '' }}>Infant</option>
        <option value="adult" {{ $patient->type == 'adult' ? 'selected' : '' }}>Adult</option>
    </select>   

    <button type="submit">Update</button>
</form>
@endsection
