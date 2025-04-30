@extends('layouts.app')

@section('content')
    <h1>Patients List</h1>
    <ul>
        @foreach ($patients as $patient)
            <li>{{ $patient->name }} - Medicines:
                <ul>
                    @foreach ($patient->medicines as $medicine)
                        <li>{{ $medicine->name }} at {{ $medicine->time_of_intake }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection

