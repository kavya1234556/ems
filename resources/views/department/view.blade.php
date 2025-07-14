<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Department</title>
</head>

<body class="bg-gray-100 min-h-screen font-sans">
    <x-navbar />

    <div class="mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Flash Messages -->
        @if (session('success'))
            <x-success :message="session('success')" />
        @endif
        @if (session('error'))
            <x-alert :error="session('error')" />
        @endif

        <!-- Header & Add Button -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Departments</h1>
            <a href="{{ route('addDepartment') }}">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    + Add Department
                </button>
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">S.N</th>
                        <th class="px-6 py-3 text-left font-semibold">Department Name</th>
                        <th class="px-6 py-3 text-left font-semibold">Description</th>
                        <th class="px-6 py-3 text-center font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse($department as $dep)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $dep->name }}</td>
                            <td class="px-6 py-4">{{ $dep->description }}</td>
                            <td class="px-6 py-4 text-center flex justify-center gap-4">
                                <a href="/department/edit/{{ $dep->id }}" title="Edit"
                                    class="text-blue-500 hover:text-blue-700 text-xl">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ route('delete.department', $dep->id) }}" title="Delete"
                                    class="text-red-500 hover:text-red-700 text-xl">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">
                                No departments found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
