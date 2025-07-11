@if ($message)
    <div id="success-message" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-lg">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg text-center">
            <strong class="font-bold">Success: </strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    </div>

    <script>
        setTimeout(function() {
            const msg = document.getElementById('success-message');
            if (msg) {
                msg.style.display = 'none';
            }
        }, 2000);
    </script>
@endif
