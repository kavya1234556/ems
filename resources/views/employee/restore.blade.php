<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Employees</title>
</head>

<body class="bg-gray-100 min-h-screen font-sans">
    <x-navbar />
    @if (session('success'))
        <x-success :message="session('success')" />
    @endif
    <div class=" mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Deleted Employees</h1>

        <!-- Filter & Search -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <form action="{{ route('get.all.deleted.employee') }}" method="GET"
                class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input id="search" name="search" value="{{ request()->search }}"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                        placeholder="Search by First Name, Last Name" />
                </div>

                <div>
                    <label for="dept_id" class="block text-sm font-medium text-gray-700 mb-1">Filter by
                        Department</label>
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

                <div class="flex items-end gap-2">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                        Apply Filters
                    </button>
                    <a href="{{ route('get.all.deleted.employee') }}"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition w-full text-center">
                        Clear
                    </a>
                </div>
            </form>
        </div>

        <!-- Employee Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-blue-600 text-white text-left">
                    <tr>
                        <th class="px-4 py-3">S.N</th>
                        <th class="px-4 py-3">First Name</th>
                        <th class="px-4 py-3">Last Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Position</th>
                        <th class="px-4 py-3">Salary</th>
                        <th class="px-4 py-3">Hire Date</th>
                        <th class="px-4 py-3">Department</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($employees as $emp)
                        <tr>
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $emp->first_name }}</td>
                            <td class="px-4 py-3">{{ $emp->last_name }}</td>
                            <td class="px-4 py-3">{{ $emp->email }}</td>
                            <td class="px-4 py-3">{{ $emp->phone }}</td>
                            <td class="px-4 py-3">{{ $emp->position }}</td>
                            <td class="px-4 py-3">Rs. {{ number_format($emp->salary) }}</td>
                            <td class="px-4 py-3">{{ $emp->hire_date }}</td>
                            <td class="px-4 py-3">{{ $emp->departments->name }}</td>
                            <td class="px-4 py-3 flex justify-center">
                                <a href="{{ route('restore.employee', $emp->id) }}"
                                    class="text-blue-600 hover:text-blue-800 transition" title="Restore Employee">
                                    <!-- Restore icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-4 text-gray-500">No deleted employees found.</td>
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
