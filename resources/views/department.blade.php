<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Department</title>
</head>

<body class="bg-gray-100 p-4">
    <x-navbar />
    @if (session('success'))
        <x-success :message="session('success')" />
    @endif
    <div class="flex justify-end p-3">
        <a href="{{ route('addDepartment') }}">
            <button class="w-[150px] bg-blue-500 text-white mt-[20px] rounded-xl h-[40px] hover:bg-blue-600">
                Add Department
            </button>
        </a>
    </div>
    <div class="overflow-x-auto bg-white rounded-lg shadow-md mt-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-500">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">S.N</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Department Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Description</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($department as $dep)
                    <tr>
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $dep->name }}</td>
                        <td class="px-6 py-4">{{ $dep->description }}</td>
                        <td class="px-6 py-4 flex gap-4">
                            <a href="/department/edit/{{ $dep->id }}" class="text-blue-500 hover:text-blue-700">
                                ✏️
                            </a>
                            <a href="{{ route('delete.department', $dep->id) }}"
                                class="text-blue-500 hover:text-blue-700">
                                🗑️
                            </a>
                        </td>
                    </tr>
                @endforeach
                @if (session('error'))
                    <x-alert :error="session('error')" />
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
