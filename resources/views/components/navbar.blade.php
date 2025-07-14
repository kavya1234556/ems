<body>
    <nav class="bg-blue-600 p-4 shadow">
        <div class="flex justify-between items-center">
            <div class="flex space-x-4 justify-start items-center">
                <a href="/department/view"
                    class="text-white font-medium hover:bg-blue-700 px-3 py-2 rounded transition">Department</a>
                <a href="/employee/view"
                    class="text-white font-medium hover:bg-blue-700 px-3 py-2 rounded transition">Employee</a>
            </div>
            <div class="flex">
                <a href="/dashboard"
                    class="text-white font-medium hover:bg-blue-700 px-3 py-2 rounded transition">Dashboard</a>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 text-white font-medium hover:bg-blue-700 cursor-pointer px-4 py-2 rounded transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3H5.25A2.25 2.25 0 003 5.25v13.5A2.25 2.25 0 005.25 21H13.5a2.25 2.25 0 002.25-2.25V15M18 15l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
</body>
