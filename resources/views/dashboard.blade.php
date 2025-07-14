<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Dashboard</title>
</head>

<body class="bg-gray-100 min-h-screen font-sans">
    <x-navbar />
    <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Admin Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <a href="/employee/view"
                class="flex items-center justify-between bg-white rounded-2xl shadow hover:shadow-md p-6 transition border hover:border-blue-600">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Employees</h2>
                    <p class="text-sm text-gray-500">Total Count: <span class="font-bold">{{ $employees }}</span></p>
                    <p class="text-sm text-gray-500">View and manage employees </p>
                </div>
                <div class="text-3xl">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
            </a>

            <a href="/department/view"
                class="flex items-center justify-between bg-white rounded-2xl shadow hover:shadow-md p-6 transition border hover:border-blue-600">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Departments</h2>
                    <p class="text-sm text-gray-500">Total Count: <span class="font-bold">{{ $departments }}</span></p>
                    <p class="text-sm text-gray-500">View and manage departments </p>
                </div>
                <div class=" text-3xl">
                    <i class="fa-solid fa-building"></i>
                </div>
            </a>

            <a href="/employee/restore"
                class="flex items-center justify-between bg-white rounded-2xl shadow hover:shadow-md p-6 transition border hover:border-blue-600">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Restore Records</h2>
                    <p class="text-sm text-gray-500">Total Count: <span class="font-bold">{{ $employeesDeleted }}</span>
                    </p>
                    <p class="text-sm text-gray-500">View and recover employees</p>
                </div>
                <div class="text-3xl">
                    <i class="fa-solid fa-trash-can-arrow-up"></i>
                </div>
            </a>

        </div>
    </div>

</body>

</html>
