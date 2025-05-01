<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="max-w-4xl mx-auto p-6 mt-10 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6">Patients List</h1>

        <ul class="space-y-4">
            @foreach ($patients as $patient)
                <li class="bg-gray-50 p-4 rounded border border-gray-200">
                    <div class="font-semibold text-lg mb-2">{{ $patient->name }}</div>
                    <div class="ml-4">
                        <p class="text-sm font-medium mb-1">Medicines:</p>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            @forelse ($patient->medicines as $medicine)
                                <li>
                                    {{ $medicine->name }} at 
                                    @foreach (explode(',', $medicine->time_of_intake) as $time)
                                        <span class="inline-block bg-gray-200 px-2 py-0.5 rounded text-xs">
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', trim($time))->format('g A') }}
                                        </span>
                                    @endforeach
                                </li>
                            @empty
                                <li class="text-gray-500">No medicines assigned.</li>
                            @endforelse
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>
