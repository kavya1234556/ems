@if ($error)
    <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-lg">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg text-center">
            <strong class="font-bold">Error: </strong>
            <span class="block sm:inline">{{ $error }}</span>
        </div>
    </div>
@endif
