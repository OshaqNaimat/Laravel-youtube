<x-layout>


    <div class="bg-[#0f0f0f] text-white">

        {{-- navbar --}}
        <x-navbar />
        <div class="flex">

            <!-- Sidebar -->
            <x-sidebar />

            {{-- mobile navbar --}}
            <x-mobilenav />

            {{-- skeleton --}}

            <!-- Main Content -->
            <main class="flex-1 p-6">

                <x-savedVideo-skeleton />
                <!-- Page Title -->

                <div class="ml-0 md:ml-16 lg:ml-56 overflow-x-hidden min-h-screen">
                    <h1 class="text-2xl font-bold mb-6 ">Saved Videos</h1>

                    <!-- Videos Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-4 gap-4">

                        <!-- 🔁 START FOREACH -->
                        @foreach ($videos as $item)
                            <a href="/singleVideo/{{ $item->video->id }}" class="flex flex-col group cursor-pointer">

                                {{-- Thumbnail --}}
                                <div class="relative w-full aspect-video rounded-xl overflow-hidden bg-gray-200">
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
                                        src="{{ asset('storage/' . $item->video->thumbnail) }}" alt="thumbnail">
                                    <span
                                        class="absolute bottom-2 right-2 bg-black bg-opacity-80 text-white text-xs px-1.5 py-0.5 rounded">
                                        Time
                                    </span>
                                </div>

                                {{-- Info --}}
                                <div class="flex mt-3 gap-2">
                                    <i class="bi bi-person-circle text-2xl shrink-0"></i>
                                    <div class="flex flex-col flex-1 min-w-0">
                                        <div class="flex justify-between items-start">
                                            <p class="font-semibold text-sm line-clamp-2 leading-snug">
                                                {{ $item->video->title }}
                                            </p>
                                            <div
                                                class="h-8 w-8 aspect-square rounded-full flex items-center justify-center hover:bg-red-500 transition cursor-pointer -shrink-0 opacity-0 group-hover:opacity-100">
                                                <i class="bi bi-three-dots-vertical leading-none"></i>
                                            </div>
                                        </div>
                                        <p class="text-sm text-capitalize text-gray-400">
                                            {{ $item->video->user->name }}

                                        </p>
                                        <div class="flex">
                                            <p class="text-sm text-gray-400">
                                                {{-- {{ $videoViews['views'] ? $videoViews['views'] : 0 }} views · --}}
                                                Views .
                                            </p>
                                            <span
                                                class="text-sm text-gray-400 upload-time">{{ $item['created_at'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>

                @if ($videos->isEmpty())
                    <div class="text-center mt-20 text-gray-400">
                        <p class="text-lg">No saved videos found</p>
                    </div>
                @endif


            </main>
        </div>

    </div>
    <script>
        document.querySelectorAll('.upload-time').forEach((item, index) => {

            item.innerHTML = moment(item.innerHTML).fromNow()
        })
    </script>

</x-layout>
