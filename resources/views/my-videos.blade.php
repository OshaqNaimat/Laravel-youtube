<x-layout>
    <div class="bg-[#0f0f0f] text-white">
        <x-navbar />
        <div class="flex">
            <x-sidebar />
            <main class="flex-1 p-6">
                <div id="skeleton-container">
                    <x-savedVideo-skeleton />
                </div>

                <div id="main-content" class="hidden ml-0 md:ml-16 lg:ml-56 overflow-x-hidden min-h-screen">
                    <h1 class="text-2xl font-bold mb-6">My Videos</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-4 gap-4">
                        @forelse ($videos as $item)
                            <a href="/singleVideo/{{ $item->id }}" class="flex flex-col group cursor-pointer">

                                {{-- Thumbnail --}}
                                <div class="relative w-full aspect-video rounded-xl overflow-hidden bg-gray-200">
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition"
                                        src="{{ asset('storage/' . $item->thumbnail) }}">
                                </div>

                                {{-- Info --}}
                                <div class="flex mt-3 gap-2">
                                    <i class="bi bi-person-circle text-2xl shrink-0"></i>
                                    <div class="flex flex-col flex-1 min-w-0">
                                        <p class="font-semibold text-sm line-clamp-2">
                                            {{ $item->title }}
                                        </p>
                                        <p class="text-sm text-gray-400">
                                            {{ $item->user->name }}
                                        </p>
                                        <div class="flex gap-1 text-sm text-gray-400">
                                            {{-- Direct call to views relationship --}}
                                            <span>{{ $item->views->first()->views ?? 0 }} views</span>
                                            <span>•</span>
                                            <span class="upload-time">{{ $item->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-full text-center py-20">
                                <p class="text-gray-400">You haven't uploaded any videos yet.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- jQuery for Skeleton and Moment --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(window).on('load', function() {
            $('#skeleton-container').addClass('hidden');
            $('#main-content').removeClass('hidden');
        });

        $(document).ready(function() {
            $('.upload-time').each(function() {
                $(this).text(moment($(this).text()).fromNow());
            });
        });
    </script>
</x-layout>
