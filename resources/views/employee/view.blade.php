<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>Employee</title>
</head>

<body class="bg-gray-100 min-h-screen font-sans">
    <x-navbar />
    @if (session('success'))
        <x-success :message="session('success')" />
    @endif
    <div class="mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Employee List</h1>
            <a href="{{ route('store.employee') }}">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    + Add Employee
                </button>
            </a>
        </div>

        <!-- Filter Form -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <form action="{{ route('getAllEmployee') }}" method="GET"
                class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input id="search" name="search" value="{{ request()->search }}"
                        placeholder="Search by First Name, Last Name"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label for="dept_id" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                    <select id="dept_id" name="dept_id"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">All Departments</option>
                        @foreach ($departments as $dep)
                            <option value='{{ $dep->id }}' {{ request()->dept_id == $dep->id ? 'selected' : '' }}>
                                {{ $dep->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition w-full">
                        Apply Filter
                    </button>
                    <a href="{{ route('getAllEmployee') }}"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition w-full text-center">
                        Clear
                    </a>
                </div>
            </form>
        </div>

        <!-- Employee Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">S.N</th>
                        <th class="px-6 py-3 text-left font-semibold">First Name</th>
                        <th class="px-6 py-3 text-left font-semibold">Last Name</th>
                        <th class="px-6 py-3 text-left font-semibold">Email</th>
                        <th class="px-6 py-3 text-left font-semibold">Phone</th>
                        <th class="px-6 py-3 text-left font-semibold">Position</th>
                        <th class="px-6 py-3 text-left font-semibold">Salary</th>
                        <th class="px-6 py-3 text-left font-semibold">Hire Date</th>
                        <th class="px-6 py-3 text-left font-semibold">Department</th>
                        <th class="px-6 py-3 text-center font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($employees as $emp)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $emp->first_name }}</td>
                            <td class="px-6 py-4">{{ $emp->last_name }}</td>
                            <td class="px-6 py-4">{{ $emp->email }}</td>
                            <td class="px-6 py-4">{{ $emp->phone }}</td>
                            <td class="px-6 py-4">{{ $emp->position }}</td>
                            <td class="px-6 py-4">Rs. {{ number_format($emp->salary) }}</td>
                            <td class="px-6 py-4">{{ $emp->hire_date }}</td>
                            <td class="px-6 py-4">{{ $emp->departments->name }}</td>
                            <td class="px-6 py-4 text-center flex justify-center gap-3">
                                <a href="/employee/edit/{{ $emp->id }}" title="Edit"
                                    class="text-blue-500 hover:text-blue-700 text-xl"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('delete.employee', $emp->id) }}" title="Delete"
                                    class="text-red-500 hover:text-red-700 text-xl"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-4 text-gray-500">No employees found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="p-4">
                {{ $employees->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</body>

</html>
