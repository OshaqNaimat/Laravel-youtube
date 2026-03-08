<style>
  .sidebarscroll::-webkit-scrollbar { display: none; }

  /* Sidebar widths */
  #sidebar {
    transition: transform 0.3s ease, width 0.3s ease;
  }

  /* sm: hidden by default, toggled via JS */
  @media (max-width: 767px) {
    #sidebar {
      width: 220px;
      transform: translateX(-100%);
    }
    #sidebar.open {
      transform: translateX(0);
    }
  }

  /* md: always visible, icon-only */
  @media (min-width: 768px) and (max-width: 1023px) {
    #sidebar {
      width: 64px;
      transform: translateX(0) !important;
    }
  }

  /* lg+: full sidebar */
  @media (min-width: 1024px) {
    #sidebar {
      width: 220px;
      transform: translateX(0) !important;
    }
  }
</style>

<aside
  id="sidebar"
  class="sidebarscroll bg-black fixed left-0 top-[57px] h-[calc(100vh-57px)] overflow-y-scroll z-40"
>
  {{-- Each nav item --}}
  @php
    $items = [
      ['icon' => 'bi-house',            'label' => 'Home'],
      ['icon' => 'bi-collection-play',  'label' => 'Shorts'],
    ];
  @endphp

  @foreach($items as $item)
    <a href="#" class="sidebar-item flex items-center gap-3 font-semibold text-white text-lg my-1 p-3 hover:bg-red-500 cursor-pointer rounded-md transition">
      <i class="bi {{ $item['icon'] }} text-xl flex-shrink-0"></i>
      <span class="sidebar-label hidden lg:inline whitespace-nowrap">{{ $item['label'] }}</span>
    </a>
  @endforeach

  <hr class="border-gray-700 my-2">

  {{-- Section with arrow --}}
  <a href="#" class="sidebar-item flex items-center justify-between font-semibold text-white text-lg my-1 p-3 hover:bg-red-500 cursor-pointer rounded-md transition">
    <span class="sidebar-label hidden lg:inline">Subscriptions</span>
    <i class="bi bi-arrow-right text-xl flex-shrink-0"></i>
  </a>

  @foreach(['Channel Name','Channel Name','Channel Name','Channel Name','Channel Name'] as $ch)
    <a href="#" class="sidebar-item flex items-center gap-3 font-semibold text-white text-lg my-1 p-3 hover:bg-red-500 cursor-pointer rounded-md transition">
      <i class="bi bi-person-circle text-xl flex-shrink-0"></i>
      <span class="sidebar-label hidden lg:inline whitespace-nowrap">{{ $ch }}</span>
    </a>
  @endforeach

  <hr class="border-gray-700 my-2">

  <a href="#" class="sidebar-item flex items-center justify-between font-semibold text-white text-lg my-1 p-3 hover:bg-red-500 cursor-pointer rounded-md transition">
    <span class="sidebar-label hidden lg:inline">You</span>
    <i class="bi bi-arrow-right text-xl flex-shrink-0"></i>
  </a>

  @php
    $youItems = [
      ['icon' => 'bi-clock',            'label' => 'History'],
      ['icon' => 'bi-list',             'label' => 'Playlists'],
      ['icon' => 'bi-clock-history',    'label' => 'Watch Later'],
      ['icon' => 'bi-hand-thumbs-up',   'label' => 'Liked Videos'],
      ['icon' => 'bi-play',             'label' => 'Your Videos'],
      ['icon' => 'bi-download',         'label' => 'Download'],
    ];
  @endphp

  @foreach($youItems as $item)
    <a href="#" class="sidebar-item flex items-center gap-3 font-semibold text-white text-lg my-1 p-3 hover:bg-red-500 cursor-pointer rounded-md transition">
      <i class="bi {{ $item['icon'] }} text-xl flex-shrink-0"></i>
      <span class="sidebar-label hidden lg:inline whitespace-nowrap">{{ $item['label'] }}</span>
    </a>
  @endforeach

  <hr class="border-gray-700 my-2">

  <a href="#" class="sidebar-item flex items-center gap-3 font-semibold text-white text-lg my-1 p-3 mb-4 hover:bg-red-500 cursor-pointer rounded-md transition">
    <i class="bi bi-box-arrow-left text-xl flex-shrink-0"></i>
    <span class="sidebar-label hidden lg:inline whitespace-nowrap">Logout</span>
  </a>
</aside>

{{-- Overlay for mobile --}}
<div
  id="sidebar-overlay"
  onclick="toggleSidebar()"
  class="fixed inset-0 bg-black/50 z-30 hidden md:hidden"
></div>

<script>
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const isOpen = sidebar.classList.contains('open');

    if (window.innerWidth < 768) {
      sidebar.classList.toggle('open', !isOpen);
      overlay.classList.toggle('hidden', isOpen);
    }
  }
</script>
