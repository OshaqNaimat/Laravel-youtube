<x-layout>

    <div class="bg-black/50 fixed all-form flex items-center justify-center top-0 z-300 w-full min-h-screen px-4">


        {{-- first form --}}
  <div class="bg-[#212121] rounded-xl first-form w-full sm:w-[480px] md:w-[720px] shadow-2xl overflow-hidden">

    <!-- Header -->
    <div class="flex items-center justify-between px-4 md:px-6 py-4 border-b border-[#3a3a3a]">
      <h2 class="text-white text-base md:text-xl font-medium">Upload videos</h2>
      <div class="flex items-center gap-3">
        <button class="text-gray-400 rounded-full formclose hover:scale-110 hover:text-white h-8 w-8 flex justify-center items-center cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Body -->
    <div class="flex flex-col items-center justify-center py-10 md:py-16 px-4 md:px-8">
      <label for="fileInput" class="bg-[#2e2e2e] hover:scale-105 transition cursor-pointer rounded-full w-24 h-24 md:w-36 md:h-36 flex items-center justify-center mb-6 md:mb-8">
        <div class="flex flex-col items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 md:w-14 md:h-14 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 4v12M8 8l4-4 4 4"/>
          </svg>
          <div class="w-8 md:w-10 h-0.5 bg-gray-500 rounded mt-1"></div>
        </div>
      </label>

      <p class="text-white text-base md:text-lg font-medium mb-2 text-center">Drag and drop video files to upload</p>
      <p class="text-gray-400 text-xs md:text-sm mb-6 md:mb-8 text-center">Your videos will be private until you publish them.</p>

      <label for="fileInput" class="bg-white text-black font-medium px-5 md:px-6 py-2 md:py-2.5 rounded-full cursor-pointer hover:bg-gray-200 text-sm">
        Select files
      </label>
      <input id="fileInput" type="file" accept="video/*" class="hidden video-input" />
    </div>

    <!-- Footer -->
    <div class="px-4 md:px-8 pb-6 md:pb-8 text-center">
      <p class="text-gray-400 text-xs leading-relaxed">
        By submitting your videos to YouTube, you acknowledge that you agree to YouTube's
        <a href="#" class="text-blue-400 hover:underline">Terms of Service</a> and
        <a href="#" class="text-blue-400 hover:underline">Community Guidelines</a>.<br/>
        Please be sure not to violate others' copyright or privacy rights.
        <a href="#" class="text-blue-400 hover:underline">Learn more</a>
      </p>
    </div>

  </div>







  {{-- second form --}}

{{-- <div class="bg-black flex items-center justify-center min-h-screen px-4"> --}}

  <div class="bg-[#212121] rounded-xl hidden second-form  w-full sm:w-[480px] md:w-[720px] shadow-2xl overflow-hidden  flex-col max-h-[95vh]">

    <!-- Header -->
    <div class="flex items-center justify-between px-4 py-3 border-b border-[#3a3a3a] shrink-0">
        <div class="h-8 w-8 pehla-form rounded-full hover:bg-red-500 transition cursor-pointer flex items-center justify-center hover:scale-90">
            <i class="bi bi-arrow-left"></i>
        </div>

      <div class="flex items-center gap-2">

        <button class="h-8 w-8 formclose rounded-full hover:bg-red-500 transition cursor-pointer flex items-center justify-center hover:scale-90">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    </div>

    <!-- Steps -->
    <div class="flex items-center justify-between px-6 py-3 border-b border-[#3a3a3a] shrink-0">
      <!-- Step 1 -->
      <div class="flex flex-col items-center gap-1">
          <div class="w-4 h-4 rounded-full bg-white flex items-center justify-center">
          <div class="w-2 h-2 rounded-full bg-[#212121]"></div>
        </div>
        <span class="text-white text-[10px] font-medium">Details</span>
    </div>
      <div class="flex-1 h-px bg-[#3a3a3a] mx-2"></div>
      <!-- Step 2 -->
      <div class="flex flex-col items-center gap-1">
        <div class="w-4 h-4 rounded-full border border-gray-500"></div>
        <span class="text-gray-500 text-[10px]">Video elements</span>
      </div>
      <div class="flex-1 h-px bg-[#3a3a3a] mx-2"></div>
      <!-- Step 3 -->
      <div class="flex flex-col items-center gap-1">
        <div class="w-4 h-4 rounded-full border border-gray-500"></div>
        <span class="text-gray-500 text-[10px]">Checks</span>
      </div>
      <div class="flex-1 h-px bg-[#3a3a3a] mx-2"></div>
      <!-- Step 4 -->
      <div class="flex flex-col items-center gap-1">
        <div class="w-4 h-4 rounded-full border border-gray-500"></div>
        <span class="text-gray-500 text-[10px]">Visibility</span>
      </div>
    </div>

    <!-- Scrollable Content -->
    <div class=" scndform overflow-y-scroll flex-1 px-4 py-4 space-y-5">

      <!-- Title Row -->
      <div class="flex items-center justify-between">
          <h2 class="text-white text-base font-medium">Details</h2>
      </div>

      <!-- Title + Preview Row -->
      <div class="flex gap-3">
        <div class="flex-1 space-y-3">
          <!-- Title -->
          <div class="border border-[#3a3a3a] rounded-md p-2">
            <p class="text-gray-400 text-[10px] mb-1">Title (required) ⓘ</p>
            <textarea class="bg-transparent text-white text-xs w-full resize-none outline-none h-14"></textarea>
            <p class="text-gray-500 text-[10px] text-right">70/100</p>
          </div>
          <!-- Description -->
          <div class="border border-[#3a3a3a] rounded-md p-2">
            <p class="text-gray-400 text-[10px] mb-1">Description ⓘ</p>
            <textarea placeholder="Tell viewers about your video (type @ to mention a channel)" class="bg-transparent text-gray-500 text-xs w-full resize-none outline-none h-20 placeholder-gray-600"></textarea>
          </div>
        </div>

        <!-- Preview -->
        <div class="w-50 shrink-0 space-y-2">
          <div class="bg-[#2e2e2e] rounded h-20 flex items-center justify-center">
            {{-- <p class="text-gray-400 text-[10px] text-center">Uploading video...</p> --}}
            <video src="" controls muted class="video-preview"></video>
          </div>
          <div>
              <p class="text-gray-400 text-[10px]">Video link</p>
            <div class="flex items-center gap-1">
                <a href="#" class="text-blue-400 text-[10px] hover:underline truncate">https://youtu.be/-Be1pDX07qg</a>
              <button class="text-gray-400 hover:text-white shrink-0">
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
              </button>
            </div>
          </div>
          <div>
            <p class="text-gray-400 text-[10px]">Filename</p>
          </div>
        </div>
      </div>

      <!-- Thumbnail -->
      <div>
        <p class="text-white text-sm font-medium mb-1">Thumbnail</p>
        <p class="text-gray-400 text-xs mb-3">Set a thumbnail that stands out and draws viewers' attention. <a href="#" class="text-blue-400 hover:underline">Learn more</a></p>
        <div class="grid grid-cols-3 gap-2">
            <div class="border border-dashed border-gray-500 rounded p-3 flex flex-col items-center gap-1 hover:bg-[#2e2e2e] cursor-pointer">
            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4-4 4 4 4-6 4 6M4 20h16"/></svg>
            <p class="text-gray-400 text-[10px] text-center">Upload file</p>
          </div>
          <div class="border border-dashed border-gray-500 rounded p-3 flex flex-col items-center gap-1 hover:bg-[#2e2e2e] cursor-pointer">
              <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l14 9-14 9V3z"/></svg>
            <p class="text-gray-400 text-[10px] text-center">Auto-generated</p>
          </div>
          <div class="border border-dashed border-gray-500 rounded p-3 flex flex-col items-center gap-1 hover:bg-[#2e2e2e] cursor-pointer">
            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            <p class="text-gray-400 text-[10px] text-center">A/B Testing</p>
          </div>
        </div>
    </div>

      <!-- Playlists -->

      <!-- Audience -->


      <!-- Age restriction -->

    </div>

    <!-- Footer -->
    <div class="flex items-center justify-between px-4 py-3 border-t border-[#3a3a3a] shrink-0">
      <div class="flex items-center gap-3">
        <button class="text-gray-400 hover:text-white">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
        </button>
        <div class="flex items-center gap-1">
          <div class="w-4 h-4 rounded-full border-2 border-blue-400 flex items-center justify-center">
            <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>
          </div>
          <span class="text-gray-300 text-xs">33</span>
        </div>
        <div class="flex items-center gap-1">
          <svg class="w-4 h-4 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <p class="text-gray-400 text-xs">Uploading 65% ... 14 seconds left</p>
      </div>
      <button class="bg-[#1a1a1a] text-white text-sm font-medium px-5 py-1.5 rounded-full hover:bg-red-500 cursor-pointer">Next</button>
    </div>

  </div>

{{-- </div> --}}
</div>


{{-- navbar --}}
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

      <div  class="flex items-center gap-1">
        <img
          class="w-[36px] h-[36px] rounded object-cover"
          src="https://thumbs.dreamstime.com/b/neon-youtube-icon-beautiful-glowing-led-light-157850307.jpg"
          alt="logo"
        >
        {{-- Hide text on xs, show from sm+ --}}
        <span class="hidden sm:inline text-white font-bold text-xl tracking-tight" style="font-family:'YouTube Sans','Roboto',sans-serif;">
          Stu<span class="bg-red-600 px-1 rounded-sm">dio</span>
        </span>
      </div>
    </div>

    {{-- MIDDLE: Search (hidden on xs, visible from sm) --}}
    <div class="hidden sm:flex flex-1 max-w-xl items-center gap-2 justify-center">
      <div class="flex rounded-full bg-[#1a1a1a] items-center  ">
        <x-searchbar />
      </div>
      {{-- <button class="hover:bg-red-500 h-10 w-10 flex items-center justify-center transition p-2 rounded-full cursor-pointer flex-shrink-0">
        <i class="bi bi-mic text-lg"></i>
      </button> --}}
    </div>

    {{-- RIGHT: Actions --}}
    <div class="flex items-center gap-1 flex-shrink-0">
      {{-- Search icon on mobile only --}}
      <button class="sm:hidden hover:bg-red-500 h-10 w-10 flex items-center justify-center transition p-2 rounded-full cursor-pointer">
        <i class="bi bi-search text-lg"></i>
      </button>

      {{-- Create button: icon-only on md, full on lg+ --}}
      <button class="hidden form-open sm:flex bg-[#1a1a1a] items-center p-2 rounded-full gap-1 cursor-pointer hover:bg-red-500 transition">
        <i class="bi bi-plus text-xl"></i>
        <span class="hidden lg:inline text-sm">Create</span>

      </button>

      <button class="hover:bg-red-500 transition p-2 h-10 w-10 flex items-center justify-center rounded-full cursor-pointer">
        <i class="bi bi-bell text-lg"></i>
      </button>
      <button class="hover:bg-red-500 transition p-2 rounded-full cursor-pointer h-10 w-10 flex items-center justify-center">
        <i class="bi bi-person text-lg"></i>
      </button>
    </div>

  </div>
</nav>






<script>

    let form1 = $('.first-form')
    let form2 = $('.second-form')
    let video_input = $('.video-input')
    let pehla_form = $('.pehla-form')
    let form_close = $('.formclose')
    let all_form = $('.all-form')
    let form_open = $('.form-open')

    video_input.on('input',(e)=>{
      let file = e.target.files[0]
      form1.addClass('hidden')
      form2.removeClass('hidden').addClass('flex')
      let link = URL.createObjectURL(file)
      $('.video-preview').attr('src',link)
    })

    pehla_form.on('click',()=>{
       form2.addClass('hidden').removeClass('flex')
       form1.removeClass('hidden')
    })

    form_close.on('click',()=>{
        all_form.addClass('hidden').removeClass('flex')
    })

    form_open.on('click',()=>{
        all_form.addClass('flex').removeClass('hidden')
    })


</script>



</x-layout>
