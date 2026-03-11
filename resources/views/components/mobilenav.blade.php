<style>
  #bottom-nav {
    display: none;
  }
  @media (max-width: 766px) {
    #bottom-nav {
      display: flex;
    }
  }
</style>

<div id="bottom-nav" class="fixed bottom-0 w-full bg-black border-t border-gray-800 items-center justify-around px-4 py-2 z-50">
    <div class="flex flex-col items-center justify-center hover:bg-red-500 p-1 rounded-md cursor-pointer">
        <i class="bi bi-house text-xl"></i>
        <span class="text-[10px] font-semibold">Home</span>
    </div>
    <div class="flex flex-col items-center justify-center hover:bg-red-500 p-1 rounded-md cursor-pointer">
        <i class="bi bi-play text-xl"></i>
        <span class="text-[10px] font-semibold">Shorts</span>
    </div>
    <div class="h-8 w-8 rounded-full bg-[#1a1a1a] flex items-center justify-center hover:bg-red-500 cursor-pointer">
        <i class="bi bi-plus text-2xl"></i>
    </div>
    <div class="flex flex-col items-center justify-center hover:bg-red-500 p-1 rounded-md cursor-pointer">
        <i class="bi bi-collection-play text-xl"></i>
        <span class="text-[10px] font-semibold">Subscriptions</span>
    </div>
    <div class="flex flex-col items-center justify-center hover:bg-red-500 p-1 rounded-md cursor-pointer">
        <i class="bi bi-person-circle text-xl"></i>
        <span class="text-[10px] font-semibold">You</span>
    </div>
</div>
