 <x-layout>
     <div class="ml-0 md:ml-16 lg:ml-56 overflow-x-hidden min-h-screen">
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-4 gap-4">

             @foreach ($allData as $item)
                 <div class="flex flex-col group cursor-pointer">

                     {{-- Thumbnail --}}
                     <div class="relative w-full aspect-video rounded-xl overflow-hidden bg-gray-200">
                         <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
                             src={{ $item['thumbnail'] }} alt="thumbnail">
                         <span
                             class="absolute bottom-2 right-2 bg-black bg-opacity-80 text-white text-xs px-1.5 py-0.5 rounded">
                             Time
                         </span>
                     </div> --}}

                     {{-- Info --}}
                     <div class="flex mt-3 gap-2">
                         <i class="bi bi-person-circle text-2xl shrink-0"></i>
                         <div class="flex flex-col flex-1 min-w-0">
                             <div class="flex justify-between items-start">
                                 <p class="font-semibold text-sm line-clamp-2 leading-snug">
                                     {{ $item['title'] }}
                                 </p>
                                 <div
                                     class="h-8 w-8 aspect-square rounded-full flex items-center justify-center hover:bg-red-500 transition cursor-pointer -shrink-0 opacity-0 group-hover:opacity-100">
                                     <i class="bi bi-three-dots-vertical leading-none"></i>
                                 </div>
                             </div>
                             <p class="text-sm text-gray-400">Channel name</p>
                             <p class="text-sm text-gray-400">4.5M views · 1 year ago</p>
                         </div>
                     </div>

                 </div>
             @endforeach

         </div>
     </div>

 </x-layout>
