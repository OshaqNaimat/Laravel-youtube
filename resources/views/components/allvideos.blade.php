<x-layout>
    <div class="bg-[#0f0f0f] rounded-xl p-3 space-y-1">
        @foreach ($allSingleVideos as $item)
            <a href="/singleVideo/{{ $item['id'] }}"
                class="flex gap-3 p-2.5 rounded-xl hover:bg-white/[0.07] transition-colors duration-200 group">

                <div class="relative flex-shrink-0 w-[168px] h-[94px] bg-[#1a1a1a] rounded-lg overflow-hidden">
                    <img src="{{ asset('/storage/' . $item->thumbnail) }}" alt="{{ $item['title'] }}"
                        class="w-full h-full object-cover">
                    <span
                        class="absolute bottom-1.5 right-1.5 bg-black/80 text-white text-[11px] font-medium px-1.5 py-px rounded">
                        {{-- {{ $allSingleVideo->duration }} --}}
                    </span>
                    <div
                        class="absolute bottom-0 left-0 h-[3px] bg-red-600 w-0 group-hover:w-3/5 transition-all duration-500 rounded-r-sm">
                    </div>
                </div>

                <div class="flex flex-col justify-start pt-0.5 min-w-0">
                    <p
                        class="text-[13.5px] font-medium text-[#e8e8e8] group-hover:text-white leading-snug line-clamp-2 mb-1.5 transition-colors duration-150">
                        {{ $item['title'] }}
                    </p>
                    <div class="text-[12px] text-[#aaa] leading-relaxed">
                        <span class="block">{{ $item->user->name }}</span>
                        <span class="block">247K
                            views
                            ·
                            Time of upload</span>
                    </div>
                </div>

            </a>
        @endforeach
        {{-- <div class="relative w-40 flex-shrink-0 rounded-md overflow-hidden bg-black">
                                        <img src="${video.thumbnail || 'https://via.placeholder.com/120x68?text=Thumb'}"
                                            class="w-full h-full object-cover aspect-video" alt="thumbnail">
                                        <span
                                            class="absolute bottom-1 right-1 bg-black/80 text-white text-[10px] px-1 rounded">duration</span>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-white text-sm font-medium line-clamp-2">video.title</p>
                                        <p class="text-yt-gray text-xs mt-1 flex items-center gap-1"><i
                                                class="fas fa-eye"></i> views</p>
                                        <p class="text-yt-gray text-xs">date</p>
                                    </div> --}}
    </div>
</x-layout>
