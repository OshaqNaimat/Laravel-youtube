@if (session()->has('message'))
    <div id="flash-message"
        class="fixed top-5 right-5 z-[9999] flex items-center gap-4 p-5 rounded-xl shadow-2xl
        bg-gradient-to-r from-black via-gray-900 to-red-700
        border border-red-500/40 text-white backdrop-blur-md
        transition-opacity duration-500 opacity-100">

        <div class="p-">
            <p class="font-semibold text-red-300">{{ session('message') }}</p>
        </div>
    </div>

    <script>
        setTimeout(() => {
            const msg = document.getElementById('flash-message');
            if (msg) {
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 500);
            }
        }, 3500);
    </script>
@endif
