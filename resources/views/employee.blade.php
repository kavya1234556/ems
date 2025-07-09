<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Employee</title>
</head>

<body class="bg-gray-100 p-4">
    <x-navbar />

    <div class="flex justify-end p-3">
        <a href="{{ route('store.employee') }}">
            <button class="w-[150px] bg-blue-500 text-white mt-[20px] rounded-xl h-[40px] hover:bg-blue-600">
                Add Employee
            </button>
        </a>
    </div>
    <div class="overflow-x-auto bg-white rounded-lg shadow-md mt-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-500">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">S.N</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">First Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Last Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Phone</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Position</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Salary</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Hire Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">department</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Action</th>

                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($employees as $emp)
                    <tr>
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $emp->first_name }}</td>
                        <td class="px-6 py-4">{{ $emp->last_name }}</td>
                        <td class="px-6 py-4">{{ $emp->email }}</td>
                        <td class="px-6 py-4">{{ $emp->phone }}</td>
                        <td class="px-6 py-4">{{ $emp->position }}</td>
                        <td class="px-6 py-4">{{ $emp->salary }}</td>
                        <td class="px-6 py-4">{{ $emp->hire_date }}</td>
                        <td class="px-6 py-4">{{ $emp->departments->name }}</td>
                        <td class="px-6 py-4 flex gap-4">
                            <a href="/employee/edit/{{ $emp->id }}" class="text-blue-500 hover:text-blue-700">
                                ✏️
                            </a>
                            <a href="{{ route('delete.employee', $emp->id) }}"
                                class="text-blue-500 hover:text-blue-700">
                                🗑️
                            </a>
                            {{-- <form method="POST" action="{{ route('delete.employee', $emp->id) }}">
                                @csrf
                                @method('DELETE')
                                <button>
                                    🗑️
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
