<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List</title>
</head>
<body>
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
</body>
</html>
