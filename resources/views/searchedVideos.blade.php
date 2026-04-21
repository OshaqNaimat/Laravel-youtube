<x-layout>

    <x-navbar />
    <x-sidebar />

    <div class="bg-black text-white font-sans ">

        <!-- Container -->
        <div class="video-list max-w-6xl mx-auto px-4 py-6 ml-0 md:ml-16 lg:ml-56 overflow-x-hidden min-h-screen">

            <!-- Video Item -->
            {{-- skeleton loader --}}

            <x-video-skeleton />



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
                response.videos.forEach((item, index) => {
                    content += `
                            <a href="/singleVideo/${item.id}" class="flex flex-col md:flex-row gap-4 mb-6 group cursor-pointer">

                        <div class="relative w-full md:w-[400px] flex-shrink-0">
                        <img src="/storage/${item.thumbnail}"
                            class="w-full h-[220px] object-cover rounded-xl">


                    </div>

                    <div>
                        <h2 class="text-lg md:text-xl font-semibold group-hover:text-gray-300">
                            ${item.title}
                            </h2>

                        <p class="text-gray-400 text-sm mt-1">
                            ${item?.views[0]?.views ? item?.views[0].views : 0} views •
                        </p>

                        <p class="text-gray-400 text-sm mt-1">
                            ${item['created_at']}
                        </p>

                        <div class="flex items-center gap-2 mt-2">
                            <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg?semt=ais_hybrid&w=740&q=80" class="w-8 h-8 rounded-full">
                            <span class="text-gray-300 text-sm">
                                ${item.user.name}
                                </span>
                        </div>

                        <p class="text-gray-400 text-sm mt-2">
                            ${item.description ? item.description : ''}
                            </p>
                    </div>

                </a>
                        `
                })


                $('.video-list').html(content)
            }
        })
    </script>

</x-layout>
