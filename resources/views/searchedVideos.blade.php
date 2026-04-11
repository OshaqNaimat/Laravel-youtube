<x-layout>

    <x-navbar />
    <x-sidebar />

    <div class="bg-[#0f0f0f] text-white font-sans ">

        <!-- Container -->
        <div class="max-w-6xl mx-auto px-4 py-6 ml-0 md:ml-16 lg:ml-56 overflow-x-hidden min-h-screen">

            <!-- Video Item -->
            <div class="flex flex-col md:flex-row gap-4 mb-6 group cursor-pointer">

                <!-- Thumbnail -->
                <div class="relative w-full md:w-[400px] flex-shrink-0">
                    <img src="https://i.ytimg.com/vi/3JWTaaS7LdU/maxresdefault.jpg"
                        class="w-full h-[220px] object-cover rounded-xl group-hover:opacity-90 transition">

                    <!-- Duration -->
                    <span class="absolute bottom-2 right-2 bg-black/80 text-xs px-2 py-1 rounded">
                        5:53
                    </span>
                </div>

                <!-- Info -->
                <div class="flex flex-col justify-start">
                    <h2 class="text-lg md:text-xl font-semibold leading-snug group-hover:text-gray-300">
                        Ace of Base - Happy Nation (super slowed)
                    </h2>

                    <p class="text-gray-400 text-sm mt-1">
                        242K views • 1 year ago
                    </p>

                    <div class="flex items-center gap-2 mt-2">
                        <img src="https://i.pravatar.cc/40" class="w-8 h-8 rounded-full">
                        <span class="text-gray-300 text-sm">NovaNest</span>
                    </div>

                    <p class="text-gray-400 text-sm mt-2 line-clamp-2">
                        song #music #scarface | Join Hamster...
                    </p>
                </div>

            </div>






        </div>

    </div>

    <script>
        let title = decodeURIComponent(window.location.pathname.split('/').pop())

        $.ajax({
            url: '/get-relavent-video',
            type: 'GET',
            data: {
                title: title
            },
            success: function(response) {
                let content = ''
                response.forEach((item, index) => {
                    content += `
                          <div class="flex flex-col md:flex-row gap-4 mb-6 group cursor-pointer">

                <div class="relative w-full md:w-[400px] flex-shrink-0">
                    <img src="https://i.ytimg.com/vi/dQw4w9WgXcQ/maxresdefault.jpg"
                        class="w-full h-[220px] object-cover rounded-xl">

                    <span class="absolute bottom-2 right-2 bg-black/80 text-xs px-2 py-1 rounded">
                        5:00
                    </span>
                </div>

                <div>
                    <h2 class="text-lg md:text-xl font-semibold group-hover:text-gray-300">
                        Ace of Base - Happy Nation [Ultra Slowed, Bass Boosted, Reverb]
                    </h2>

                    <p class="text-gray-400 text-sm mt-1">
                        350K views • 2 years ago
                    </p>

                    <div class="flex items-center gap-2 mt-2">
                        <img src="https://i.pravatar.cc/41" class="w-8 h-8 rounded-full">
                        <span class="text-gray-300 text-sm">k3rat3z</span>
                    </div>

                    <p class="text-gray-400 text-sm mt-2">
                        Best part = 1:45 | If you like the content...
                    </p>
                </div>

            </div>
                    `
                })
            }
        })
    </script>

</x-layout>
