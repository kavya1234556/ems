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

            <div class="flex flex-col items-center mb-6">
                <img id="imagePreview" src="https://via.placeholder.com/150"
                    class="w-32 h-32 rounded-full object-cover border border-gray-300 mb-4" />
                <input type="file" id="image" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700" />
            </div>

            <form class="space-y-6" action="{{ route('add') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="first_name" name="first_name" required
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" id="phone" name="phone" required
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                        <input type="text" id="position" name="position" required
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                        <input type="number" id="salary" name="salary" required step="0.01"
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label for="hire_date" class="block text-sm font-medium text-gray-700">Hire Date</label>
                        <input type="date" id="hire_date" name="hire_date" required
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                        <select id="department" name="department" required
                            class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Department</option>
                            <option value="HR">HR</option>
                            <option value="Finance">Finance</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Sales">Sales</option>
                            <option value="IT Support">IT Support</option>
                            <option value="Operations">Operations</option>
                        </select>
                    </div>

                </div>

                @if (session('error'))
                    <x-alert :error="session('error')" />
                @endif

                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Add
                </button>
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
