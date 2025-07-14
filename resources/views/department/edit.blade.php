<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Edit Department</title>
</head>



<body>
    <x-navbar />
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Edit Department Details</h2>
            <form class="space-y-4" action='{{ route('update_department', $department->id) }}' method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="name" id="name" name="name" required value='{{ $department->name }}'
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700"> Description</label>
                    <textarea type="description" id="description" name="description" required
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $department->description }}</textarea>
                    @error('description')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                @if (session('error'))
                    <x-alert :error="session('error')" />
                @endif
                <div class="flex gap-4">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        Edit
                    </button>
                    <a href="{{ route('getAllDepartment') }}"
                        class="w-full bg-blue-500 text-white text-center font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
