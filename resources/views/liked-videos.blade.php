<x-layout>

    {{-- navbar --}}
    <x-navbar />
    {{-- sidebar --}}
    <x-sidebar />

    <main class="flex-1 p-6">
        <div id="skeleton-container">
            <x-savedVideo-skeleton />
        </div>
        <!-- Page Title -->

        <div id="main-content" class="ml-0 md:ml-16 lg:ml-56 overflow-x-hidden min-h-screen">
            <h1 class="text-2xl font-bold mb-6 ">Liked Videos</h1>

            <!-- Videos Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-4 gap-4">
                @forelse ($videos as $item)
                    {{-- Link to the single video page using the related video ID --}}
                    <a href="{{ route('singlepage', $item->video->id) }}" class="flex flex-col group cursor-pointer">

                        {{-- Thumbnail --}}
                        <div class="relative w-full aspect-video rounded-xl overflow-hidden bg-gray-200">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
                                src="{{ asset('storage/' . $item->video->thumbnail) }}" alt="thumbnail">
                            <span
                                class="absolute bottom-2 right-2 bg-black bg-opacity-80 text-white text-xs px-1.5 py-0.5 rounded">
                                {{ $item->video->duration ?? '00:00' }}
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
                                </div>

                                <p class="text-sm text-gray-400 mt-1">
                                    {{ $item->video->user->name }}
                                </p>

                                <div class="flex items-center gap-1 text-sm text-gray-400">
                                    <span> {{ $item->video->views->first()->views }} views</span>
                                    <span>•</span>
                                    {{-- Shows how long ago the user LIKED the video --}}
                                    <span>Liked {{ $item->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-20">
                        <i class="bi bi-hand-thumbs-up text-5xl text-gray-600 mb-4"></i>
                        <p class="text-gray-400 text-lg">No liked videos yet.</p>
                        <a href="/" class="text-blue-500 hover:underline mt-2">Explore videos</a>
                    </div>
                @endforelse
            </div>
        </div>

        @if ($videos->isEmpty())
            <div class="text-center mt-20 text-gray-400">
                <p class="text-lg">No saved videos found</p>
            </div>
        @endif
    </main>

    <script>
        $(document).ready(function() {
            // Using $(window).on('load') ensures all images/assets are ready
            $(window).on('load', function() {
                $('#skeleton-container').fadeOut(300, function() {
                    // Remove 'hidden' class and fade in
                    $('#main-content').removeClass('hidden').hide().fadeIn(400);
                });
            });
        });
    </script>
</x-layout>
