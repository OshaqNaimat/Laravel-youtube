<x-layout>
    <x-navbar />
    <x-sidebar />

    <div class="ml-0 md:ml-16 lg:ml-56 overflow-x-hidden min-h-screen">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-4 gap-4">

            <a href="/saved-video"
                class="group relative hover:scale-105 cursor-pointer bg-[#0d1117] border border-red-900/30 p-6 rounded-2xl hover:border-red-500/50 transition-all duration-300">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-500 fill-red-500/20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" />
                        <path d="M12 7v6" />
                        <path d="M9 10h6" />
                    </svg>
                </div>
                <h3 class="text-white text-xl font-bold mb-1">Saved Videos</h3>
                <p class="text-gray-400 text-sm">Access your curated collection.</p>
            </a>

            <a href="/liked-videos"
                class="group relative hover:scale-105 cursor-pointer bg-[#0d1117] border border-blue-900/30 p-6 rounded-2xl hover:border-blue-500/50 transition-all duration-300">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-400 fill-blue-400/20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M7 10v12" />
                        <path
                            d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z" />
                    </svg>
                </div>
                <h3 class="text-white text-xl font-bold mb-1">Liked Videos</h3>
                <p class="text-gray-400 text-sm">All the videos you've loved.</p>
            </a>

            <a href="/my-videos"
                class="group relative hover:scale-105 cursor-pointer bg-[#0d1117] border border-emerald-900/30 p-6 rounded-2xl hover:border-emerald-500/50 transition-all duration-300">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-emerald-400 fill-emerald-400/20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.934a.5.5 0 0 0-.777-.416L16 11" />
                        <rect width="14" height="12" x="2" y="6" rx="2" />
                    </svg>
                </div>
                <h3 class="text-white text-xl font-bold mb-1">Your Videos</h3>
                <p class="text-gray-400 text-sm">Manage your uploads & creations.</p>
            </a>

        </div>

    </div>


</x-layout>
