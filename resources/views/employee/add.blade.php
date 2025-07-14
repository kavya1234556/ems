<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Add Employee</title>
</head>




<body>
    <x-navbar />
    <div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-3xl ">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Add New Employee</h2>


            <form class="space-y-6" action="{{ route('add_employee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center mb-6">
                    <img id="imagePreview" src="https://via.placeholder.com/150"
                        class="w-32 h-32 rounded-full object-cover border border-gray-300 mb-4" />
                    <input type="file" id="image" name="image" accept="image/*" value="{{ old('image') }}"
                        class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700" />
                    @error('image')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="first_name" name="first_name" required
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                            value="{{ old('first_name') }}" />
                        @error('first_name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required value="{{ old('last_name') }}"
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                        @error('last_name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required value="{{ old('email') }}"
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" id="phone" name="phone" required value="{{ old('phone') }}"
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                        @error('phone')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                        <input type="text" id="position" name="position" required
                            value="{{ old(key: 'position') }}"
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                        @error('position')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                        <input type="number" id="salary" name="salary" required step="0.01" min="0"
                            value="{{ old('salary') }}"
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                        @error('salary')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="hire_date" class="block text-sm font-medium text-gray-700">Hire Date</label>
                        <input type="date" id="hire_date" name="hire_date" max="{{ date('Y-m-d') }}" required
                            value="{{ old('hire_date') }}"
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                        @error('hire_date')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>

                        <label for="dept_id" class="block text-sm font-medium text-gray-700">Department</label>
                        <select id="dept_id" name="dept_id" required
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="" selected>Select your option</option>
                            @foreach ($departments as $dep)
                                <option value="{{ $dep->id }}"
                                    {{ old('dept_id') == $dep->id ? 'selected' : '' }}>
                                    {{ $dep->name }}
                                </option>
                            @endforeach

                        </select>
                        @error('dept_id')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                @if (session('error'))
                    <x-alert :error="session('error')" />
                @endif
                <div class="flex gap-4">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        Add
                    </button>
                    <a href="{{ route('getAllEmployee') }}"
                        class="w-full bg-blue-500 text-white text-center font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                imagePreview.src = URL.createObjectURL(file);
            }
        });
    </script>
</body>

</html>
