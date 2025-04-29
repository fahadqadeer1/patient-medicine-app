<ul>
    @foreach ($patients as $patient)
        <li>{{ $patient->name }} - Medicines:
            <ul>
                @foreach ($patient->medicines as $medicine)
                    <li>{{ $medicine->name }} - {{ $medicine->time_of_intake }}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
