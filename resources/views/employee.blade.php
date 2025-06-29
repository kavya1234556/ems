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
        <a href="employee/add">
            <button class="w-[150px] bg-blue-500 text-white mt-[20px] rounded-xl h-[40px] hover:bg-blue-600">
                Add Employee
            </button>
        </a>
    </div>
</body>

</html>
