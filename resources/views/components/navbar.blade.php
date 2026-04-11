<x-layout>
    <style>
        @property --angle {
            syntax: '<angle>';
            initial-value: 0deg;
            inherits: false;
        }

        @keyframes spin {
            to {
                --angle: 360deg;
            }
        }

        .input-wrapper {
            position: relative;
            width: 320px;
        }

        /* Always spinning — only opacity changes */
        .input-wrapper::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 9999px;
            background: conic-gradient(from var(--angle, 0deg),
                    transparent 0deg,
                    transparent 60deg,
                    #ff2020 90deg,
                    #ff6060 120deg,
                    #ff2020 150deg,
                    transparent 210deg,
                    transparent 360deg);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 0;
            animation: spin 1.8s linear infinite;
        }

        .input-wrapper::after {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 9999px;
            background: conic-gradient(from var(--angle, 0deg),
                    transparent 0deg,
                    transparent 60deg,
                    rgba(255, 32, 32, 0.3) 90deg,
                    rgba(255, 96, 96, 0.15) 130deg,
                    transparent 190deg,
                    transparent 360deg);
            filter: blur(6px);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 0;
            animation: spin 1.8s linear infinite;
        }

        /* On focus — just fade in, spin is already going */
        .input-wrapper.focused::before {
            opacity: 1;
        }

        .input-wrapper.focused::after {
            opacity: 1;
        }

        .input-bg {
            position: absolute;
            inset: 2px;
            border-radius: 9999px;
            background: #1a1a1a;
            z-index: 1;
        }

        input {
            position: relative;
            z-index: 2;
            width: 100%;
            padding: 10px 18px;
            padding-right: 40px;
            border-radius: 9999px;
            border: none;
            outline: none;
            background: transparent;
            color: #f0f0f0;
            font-size: 15px;
            letter-spacing: 0.02em;
            caret-color: #ff4040;
        }

        input::placeholder {
            color: #555;
            transition: color 0.3s ease;
        }

        .input-wrapper.focused input::placeholder {
            color: #7a3a3a;
        }

        .search-icon {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 3;
            color: #444;
            transition: color 0.3s ease;
            pointer-events: none;

        }

        .input-wrapper.focused .search-icon {
            color: #ff4040;
        }
        }
    </style>

    <x-flash />
    <nav class="bg-black/95 text-white sticky top-0 z-9999 border-b border-gray-800">
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
                <div class="flex rounded-full bg-[#1a1a1a] items-center relative">

                    <div class="input-wrapper" id="wrapper">
                        <div class="input-bg"></div>

                        <input type="text" placeholder="Search" id="searchInput" class="search-term" />

                        <svg id="searchBtn" class="search-icon cursor-pointer" width="16" height="16"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                    </div>

                    <!-- Dropdown -->
                    <div class="absolute hidden bg-zinc-900 search-list p-2 rounded-md w-full top-11 z-9999">
                        <ul>
                            <li class="p-2 rounded-md hover:bg-red-950 transition cursor-pointer hover:scale-98">
                                Searching ...
                            </li>

                        </ul>
                    </div>

                </div>
                <button
                    class="hover:bg-red-500 h-10 w-10 flex items-center justify-center transition p-2 rounded-full cursor-pointer flex-shrink-0">
                    <i class="bi bi-mic text-lg "></i>
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
                                    <li class="hover:bg-red-500 transition cursor-pointer hover:scale-95 p-2 rounded-md">
                                        Sign In
                                    </li>
                                </a>
                            </ul>
                        </div>
                    @endguest

                    @auth

                        <div class="relative group w-10 h-10 flex-shrink-0">
                            {{-- Avatar --}}
                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-br from-red-700 via-red-900 to-black
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

    <script>
        const input = document.getElementById('searchInput');
        const wrapper = document.getElementById('wrapper');
        const searchBtn = document.getElementById('searchBtn');

        input.addEventListener('focus', () => wrapper.classList.add('focused'));
        input.addEventListener('blur', () => wrapper.classList.remove('focused'));


        $('.search-term').on('keyup', function(e) {
            let val = $(this).val();
            if (val.length > 0) {
                $('.search-list').removeClass('hidden')
                // send request to backend
                $.ajax({
                    url: '/search',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        searchTerm: val,
                    },
                    success: function(response) {
                        let list = ''
                        response.videos.forEach((item, index) => {
                            list += `
                                 <a href="/searched-videos/${item.title}">
                                     <li class="p-2 list-none rounded-md hover:bg-red-950 transition cursor-pointer hover:scale-98">
                                         ${item.title}
                                     </li>
                                 </a>
    `;
                        });
                        $('.search-list').html(list)
                    }
                })
            } else {
                $('.search-list').addClass('hidden')
            }
        })
    </script>
</x-layout>
