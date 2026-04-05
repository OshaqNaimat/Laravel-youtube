<x-flash />


<nav class="bg-black/95 text-white sticky top-0 z-50 border-b border-gray-800">
    <div class="px-4 py-2 flex justify-between items-center gap-2">

        {{-- LEFT: Hamburger + Logo --}}
        <div class="flex items-center gap-3 flex-shrink-0">
            {{-- Hamburger toggles sidebar --}}
            <button onclick="toggleSidebar()"
                class="text-3xl cursor-pointer hover:scale-95 transition focus:outline-none">
                <i class="bi bi-list"></i>
            </button>

            <a href="/" class="flex items-center gap-1">
                <img class="w-[36px] h-[36px] rounded object-cover"
                    src="https://thumbs.dreamstime.com/b/neon-youtube-icon-beautiful-glowing-led-light-157850307.jpg"
                    alt="logo">
                {{-- Hide text on xs, show from sm+ --}}
                <span class="hidden sm:inline text-white font-bold text-xl tracking-tight"
                    style="font-family:'YouTube Sans','Roboto',sans-serif;">
                    View<span class="bg-red-600 px-1 rounded-sm">Tube</span>
                </span>
            </a>
        </div>

        {{-- MIDDLE: Search (hidden on xs, visible from sm) --}}
        <div class="hidden sm:flex flex-1 max-w-xl items-center gap-2 justify-center">
            <div class="flex rounded-full bg-[#1a1a1a] items-center  ">
                <x-searchbar />
            </div>
            <button
                class="hover:bg-red-500 h-10 w-10 flex items-center justify-center transition p-2 rounded-full cursor-pointer flex-shrink-0">
                <i class="bi bi-mic text-lg"></i>
            </button>
        </div>

        {{-- RIGHT: Actions --}}
        <div class="flex items-center gap-1 flex-shrink-0">
            {{-- Search icon on mobile only --}}
            <button
                class="sm:hidden hover:bg-red-500 h-10 w-10 flex items-center justify-center transition p-2 rounded-full cursor-pointer">
                <i class="bi bi-search text-lg"></i>
            </button>

            {{-- Create button: icon-only on md, full on lg+ --}}
            @auth

                <a href="/studio"
                    class="hidden  sm:flex bg-[#1a1a1a] items-center p-2 rounded-full gap-1 cursor-pointer hover:bg-red-500 transition">
                    <i class="bi bi-plus text-xl"></i>
                    <span class="hidden lg:inline text-sm">Create</span>

                </a>
            @endauth

            <button
                class="hover:bg-red-500 transition p-2 h-10 w-10 flex items-center justify-center rounded-full cursor-pointer">
                <i class="bi bi-bell text-lg"></i>
            </button>
            <div class="relative h-10 w-10">

                {{-- Trigger Button --}}

                @guest
                    <button
                        class="peer hover:bg-red-500 transition p-2 rounded-full cursor-pointer h-10 w-10 flex items-center justify-center">
                        <i class="bi bi-person text-lg"></i>
                    </button>
                    <div
                        class="absolute top-10 -right-3 bg-[#1A1A1A] rounded-md w-max
                invisible opacity-0 peer-hover:visible peer-hover:opacity-100
                hover:visible hover:opacity-100
                transition-all duration-150 z-50 p-1">
                        <ul class="my-1">

                            <a href="/register">
                                <li class="hover:bg-red-500 transition cursor-pointer hover:scale-95 p-2 rounded-md">Sign In
                                </li>
                            </a>
                        </ul>
                    </div>
                @endguest

                @auth

                    <div class="relative group w-10 h-10 flex-shrink-0">
                        {{-- Avatar --}}
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-violet-600
                text-white text-base font-bold flex items-center justify-center
                shadow-md select-none cursor-pointer">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        {{-- Dropdown --}}
                        <div
                            class="absolute top-12 right-0 bg-[#1A1A1A] rounded-md w-max
                invisible opacity-0 group-hover:visible group-hover:opacity-100
                transition-all duration-150 z-50 p-1">
                            <form action="/logout" method="POST">
                                @csrf
                                {{-- <ul class="my-1"> --}}
                                <button
                                    class="hover:bg-red-500 transition cursor-pointer hover:scale-95 p-2 rounded-md text-white">
                                    Sign Out
                                </button>

                                {{-- </ul> --}}
                            </form>
                        </div>
                    </div>

                @endauth

                {{-- Dropdown --}}


            </div>
        </div>

    </div>
</nav>
