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
    <h2>Add New Patient</h2>
        <form method="POST" action="{{ route('patients.store') }}">
            @csrf  <!-- CSRF Token -->

            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label>Type:</label>
            <select name="type" required>
                <option value="infant">Infant</option>
                <option value="adult">Adult</option>
            </select>

            <button type="submit">Save</button>
        </form>

@endsection
