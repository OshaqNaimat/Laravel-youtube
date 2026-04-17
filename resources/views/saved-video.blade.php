<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Saved Videos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0f0f0f] text-white">

    <div class="flex">

        <!-- Sidebar -->
        <aside class="w-60 h-screen bg-[#0f0f0f] border-r border-gray-800 p-4">
            <h2 class="text-xl font-bold mb-6">Menu</h2>

            <ul class="space-y-4">
                <li><a href="/" class="block hover:text-red-500">Home</a></li>
                <li><a href="/saved-videos" class="block text-red-500 font-semibold">Saved</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">

            <!-- Page Title -->
            <h1 class="text-2xl font-bold mb-6">Saved Videos</h1>

            <!-- Videos Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <!-- 🔁 START FOREACH -->
                @foreach ($videos as $item)
                    <div class="cursor-pointer">

                        <!-- Thumbnail -->
                        <div class="relative">
                            <img src="/{{ $item->video->thumbnail }}" class="w-full h-44 object-cover rounded-lg">

                            <!-- Duration badge (optional) -->
                            <span class="absolute bottom-2 right-2 bg-black text-xs px-2 py-1 rounded">
                                10:20
                            </span>
                        </div>

                        <!-- Video Info -->
                        <div class="flex mt-3 gap-3">

                            <!-- Channel Icon -->
                            <img src="/default-avatar.png" class="w-9 h-9 rounded-full">

                            <div>
                                <h3 class="font-semibold text-sm leading-tight line-clamp-2">
                                    {{ $item->video->title }}
                                </h3>

                                <p class="text-gray-400 text-xs mt-1">
                                    Channel Name
                                </p>

                                <p class="text-gray-500 text-xs">
                                    1M views • 2 days ago
                                </p>
                            </div>

                        </div>
                    </div>
                @endforeach
                <!-- 🔁 END FOREACH -->

            </div>

            <!-- Empty State -->
            @if ($videos->isEmpty())
                <div class="text-center mt-20 text-gray-400">
                    <p class="text-lg">No saved videos found</p>
                </div>
            @endif

        </main>
    </div>

</body>

</html>
