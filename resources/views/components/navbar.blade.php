<nav class="bg-black text-white sticky top-0 z-50 border-b border-gray-800">
  <div class="px-4 py-2 flex justify-between items-center gap-2">

    {{-- LEFT: Hamburger + Logo --}}
    <div class="flex items-center gap-3 flex-shrink-0">
      {{-- Hamburger toggles sidebar --}}
      <button
        onclick="toggleSidebar()"
        class="text-3xl cursor-pointer hover:scale-95 transition focus:outline-none"
      >
        <i class="bi bi-list"></i>
      </button>

      <a href="/" class="flex items-center gap-1">
        <img
          class="w-[36px] h-[36px] rounded object-cover"
          src="https://thumbs.dreamstime.com/b/neon-youtube-icon-beautiful-glowing-led-light-157850307.jpg"
          alt="logo"
        >
        {{-- Hide text on xs, show from sm+ --}}
        <span class="hidden sm:inline text-white font-bold text-xl tracking-tight" style="font-family:'YouTube Sans','Roboto',sans-serif;">
          You<span class="bg-red-600 px-1 rounded-sm">Tube</span>
        </span>
      </a>
    </div>

    {{-- MIDDLE: Search (hidden on xs, visible from sm) --}}
    <div class="hidden sm:flex flex-1 max-w-xl items-center gap-2 justify-center">
      <div class="flex rounded-full bg-[#1a1a1a] items-center  ">
        <x-searchbar />
      </div>
      <button class="hover:bg-red-500 transition p-2 rounded-full cursor-pointer flex-shrink-0">
        <i class="bi bi-mic text-lg"></i>
      </button>
    </div>

    {{-- RIGHT: Actions --}}
    <div class="flex items-center gap-1 flex-shrink-0">
      {{-- Search icon on mobile only --}}
      <button class="sm:hidden hover:bg-gray-800 transition p-2 rounded-full cursor-pointer">
        <i class="bi bi-search text-lg"></i>
      </button>

      {{-- Create button: icon-only on md, full on lg+ --}}
      <button class="hidden sm:flex bg-[#1a1a1a] items-center p-2 rounded-full gap-1 cursor-pointer hover:bg-[#1b2b3b] transition">
        <i class="bi bi-plus text-xl"></i>
        <span class="hidden lg:inline text-sm">Create</span>
      </button>

      <button class="hover:bg-red-500 transition p-2 rounded-full cursor-pointer">
        <i class="bi bi-bell text-lg"></i>
      </button>
      <button class="hover:bg-red-500 transition p-2 rounded-full cursor-pointer">
        <i class="bi bi-person text-lg"></i>
      </button>
    </div>

  </div>
</nav>
