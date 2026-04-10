<x-layout>

    <style>
        :root {
            --yt-red: #E01E2E;
            --yt-dark: #0A0A0A;
            --yt-card: #121212;
            --yt-sidebar: #1A1A1A;
            --yt-text: #E5E5E5;
            --yt-gray: #AAAAAA;
        }

        body {
            background-color: #0A0A0A;
            font-family: 'Inter', sans-serif;
        }


        .custom-scroll::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: #1E1E1E;
            border-radius: 8px;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: #E01E2E;
            border-radius: 8px;
        }

        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: #ff2f42;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        #app {
            height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #0A0A0A;
        }

        .top-header {
            flex-shrink: 0;
        }

        .main-scroll-area {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .video-card {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .video-card:hover {
            background-color: #2A2A2A;
            transform: translateX(2px);
        }

        .active-video {
            background: #2C0F12;
            border-left: 3px solid #E01E2E;
        }

        @media (max-width: 768px) {
            .sidebar-playlist {
                margin-top: 1rem;
            }
        }

        .comment-input:focus,
        .description-fade {
            outline: none;
        }

        .comment-input:focus {
            border-color: #E01E2E;
            box-shadow: 0 0 0 2px rgba(224, 30, 46, 0.3);
        }

        .like-btn:hover,
        .dislike-btn:hover {
            background: #2C2C2C;
        }

        .desc-content {
            transition: all 0.2s ease;
        }

        .show-more-btn {
            cursor: pointer;
            font-weight: 500;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
        }
    </style>
    </head>

    <body>
        <div id="app">

            <x-flash />
            <x-navbar />
            <div class="main-scroll-area custom-scroll">
                <div class="max-w-[1600px] mx-auto px-4 md:px-6 py-5">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <div class="lg:w-2/3 w-full">
                            <div class="bg-black rounded-xl overflow-hidden shadow-2xl border border-gray-800">
                                <video src="{{ asset('storage/' . $video->video) }}" controls autoplay
                                    class="w-full max-h-[80vh] object-contain">
                                </video>
                            </div>
                            <div class="mt-4 border-b border-gray-800 pb-3">
                                <h1 id="videoTitle" class="text-white text-xl md:text-2xl font-semibold leading-tight">
                                    {{ $video['title'] }}
                                </h1>
                                <div class="flex flex-wrap justify-between items-center mt-2">
                                    <div class="flex items-center gap-3 text-yt-gray text-sm">
                                        <span id="videoViews" class="flex items-center gap-1"><i class="fas fa-eye"></i>
                                            1.2M views</span>
                                        <span id="videoDate" class="flex items-center gap-1"><i
                                                class="far fa-calendar-alt"></i> 2 days ago</span>
                                    </div>
                                    <div class="flex items-center gap-3 mt-2 sm:mt-0">
                                        <button
                                            class="like-btn flex items-center gap-2 bg-yt-sidebar px-4 py-1.5 rounded-full text-yt-gray cursor-pointer hover:bg-red-500 transition"><i
                                                class="far fa-thumbs-up"></i>
                                            12K</button>
                                        <button
                                            class="dislike-btn flex items-center gap-2 bg-yt-sidebar px-4 py-1.5 rounded-full text-yt-gray cursor-pointer hover:bg-red-500 transition"><i
                                                class="far fa-thumbs-down"></i>
                                            Dislike</button>
                                        <button
                                            class="flex items-center gap-2 bg-yt-sidebar px-4 py-1.5 rounded-full text-yt-gray hover:bg-red-500 cursor-pointer transition">
                                            <i class="fas fa-share"></i>
                                            Share</button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-between mt-4 bg-yt-card p-3 rounded-xl border border-gray-800">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-red-700 via-red-900 to-black
                text-white text-base font-bold flex items-center justify-center
                shadow-md select-none cursor-pointer">
                                        {{ substr($video->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-white font-semibold">{{ $video->user->name }}
                                            <span class="text-yt-gray text-xs ml-1">● 2.3M subscribers</span>
                                        </p>
                                        <p class="text-yt-gray text-xs">Creator of cinematic experiences</p>
                                    </div>
                                </div>
                                <button
                                    class="bg-yt-red hover:bg-red-500 cursor-pointer text-white px-5 py-1.5 rounded-full text-sm font-medium transition">
                                    Subscribe</button>
                            </div>
                            <div class="mt-5 bg-yt-card rounded-xl border border-gray-800 overflow-hidden">
                                <div class="p-4">
                                    <div
                                        class="flex items-center gap-2 text-white font-semibold border-b border-gray-700 pb-2 mb-3">
                                        <i class="fas fa-align-left text-yt-red"></i>
                                        <span>Description</span>
                                    </div>
                                    <div id="descriptionContainer" class="text-yt-gray text-sm leading-relaxed">
                                        <!-- dynamic description will be injected here -->
                                        {{ $video['description'] }}
                                        <div id="descShort" class="desc-content">

                                        </div>
                                        <div id="descFull" class="desc-content hidden mt-2"></div>
                                        <button id="toggleDescBtn"
                                            class="show-more-btn text-yt-red text-xs mt-2 hover:underline focus:outline-none">Show
                                            more</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 bg-yt-card rounded-xl p-4 border border-gray-800">
                                <div class="flex items-center gap-3 border-b border-gray-700 pb-3 mb-4">
                                    <i class="far fa-comment-dots text-yt-red text-xl"></i>
                                    <span id="commentCount" class="text-yt-gray comment-count ml-1"></span>
                                    <h3 class="text-white font-semibold text-lg">Comments
                                    </h3>
                                </div>
                                <!-- add comment input -->
                                <div class="flex gap-3 mb-6">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-red-700 via-red-900 to-black
                text-white text-base font-bold flex items-center justify-center
                shadow-md select-none cursor-pointer">
                                        @auth
                                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                        @endauth
                                    </div>
                                    <form class="flex-1 w-full">

                                        <div class="input-wrapper">
                                            <div class="inner-bg "></div>
                                            <input type="hidden" value="{{ $video['id'] }}" name="video_id">

                                            @auth
                                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                            @endauth
                                            <input type="text" class="comment-input w-full" name="comment"
                                                placeholder="Add a public comment..." />
                                        </div>
                                        <div class="flex justify-end gap-2 mt-2">
                                            <button id="cancelCommentBtn" type="button"
                                                class="text-white text-sm px-3 py-1 rounded-full hover:bg-gray-800 cursor-pointer">Cancel</button>
                                            <button
                                                class="bg-yt-red comment-btn hover:bg-red-500 cursor-pointer text-white text-sm px-4 py-1 rounded-full font-medium transition">
                                                <img class="loader hidden"
                                                    src="https://www2.columbus.k12.nc.us/wp-content/uploads/AAPL/loaders/loading.gif"
                                                    width="20px" alt="">
                                                <span class="comment-text">Comment</span></button>
                                        </div>
                                    </form>
                                </div>
                                <div id="commentsContainer"
                                    class="space-y-4 max-h-[350px] overflow-y-auto custom-scroll pr-1">

                                    <x-comments-skeleton />

                                </div>
                            </div>
                        </div>
                        <div class="lg:w-1/3  w-full">
                            <div class="bg-[#0f0f0f] rounded-xl p-3 space-y-1">
                                @foreach ($allSingleVideos as $item)
                                    <a href="{{ route('singlepage', $item->id) }}"
                                        class="flex gap-3 p-2.5 rounded-xl hover:bg-white/[0.07] transition-colors duration-200 group">
                                        <div
                                            class="relative flex-shrink-0 w-[168px] h-[94px] bg-[#1a1a1a] rounded-lg overflow-hidden">
                                            <img src="{{ asset('/storage/' . $item->thumbnail) }}"
                                                alt="{{ $item['title'] }}" class="w-full h-full object-cover">
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
                                                </span>
                                                <span class="block upload-time"> {{ $item['created_at'] }}</span>
                                            </div>
                                        </div>

                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function commentsData(response) {
                let layout = ''
                //loop over comment
                $('.comment-count').html(response.comments.length)

                response.comments.forEach((item, index) => {
                    layout += ` <div class="bg-[#0A0A0A] border border-gray-800 rounded-md text-white p-4 w-full">

                                        <!-- COMMENT CARD -->
                                        <div class="flex gap-3">

                                            <!-- AVATAR -->
                                            <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg?semt=ais_hybrid&w=740&q=80"
                                                class="w-10 h-10 rounded-full">

                                            <!-- CONTENT -->
                                            <div class="flex-1">

                                                <!-- HEADER -->
                                                <div class="flex items-center gap-2 text-sm">
                                                    <span class="font-semibold">@${item.user.name}</span>
                                                    <span class="text-gray-400 text-xs">
                                                        ${moment(item.created_at).fromNow()}
                                                        </span>
                                                </div>

                                                <!-- COMMENT TEXT -->
                                                <p class="mt-1 text-gray-200">
                                                     ${item.comment}
                                                </p>

                                                <!-- ACTIONS -->
                                                <div class="flex items-center gap-5 mt-2 text-gray-400 text-sm">

                                                    <!-- LIKE -->
                                                    <div
                                                        class="flex items-center gap-1 cursor-pointer hover:text-white">
                                                        👍 <span>47</span>
                                                    </div>

                                                    <!-- DISLIKE -->
                                                    <div class="cursor-pointer hover:text-white">
                                                        👎
                                                    </div>

                                                    <!-- REPLY -->
                                                    <button class="hover:text-white">
                                                        Reply
                                                    </button>

                                                </div>
                                            </div>

                                            <!-- HEART (RIGHT SIDE) -->
                                            <div class="text-red-500 text-xl cursor-pointer hover:scale-110 transition">
                                                ❤️
                                            </div>

                                        </div>

                                    </div>`
                })
                $('#commentsContainer').html(layout)
            }

            //  load all the comments initially

            $.ajax({
                url: '/get-comments',
                type: 'GET',
                data: {
                    user_id: $('input[name="user_id"]').val(),
                    video_id: $('input[name="video_id"]').val(),
                },
                success: function(response) {
                    commentsData(response)
                }
            })



            // ajax
            $('.comment-btn').on('click', function(e) {
                e.preventDefault();
                console.log('clicked');

                $.ajax({
                    url: '/add-comment',
                    type: 'POST',
                    data: {
                        comment: $('input[name="comment"]').val(),
                        user_id: $('input[name="user_id"]').val(),
                        video_id: $('input[name="video_id"]').val(),
                    },
                    beforeSend: function() {
                        $('.comment-btn').attr('disabled', true)
                        $('.comment-btn').addClass('bg-gray-500')
                        $('.loader').removeClass('hidden')
                        $('.comment-text').addClass('hidden')
                    },
                    success: function(response) {
                        console.log(response)
                        if (!response) {
                            window.location.assign('http://localhost:8000/register')
                        } else {
                            $('.comment-btn').attr('disabled', false)
                            $('.comment-btn').removeClass('bg-gray-500')
                            $('.loader').addClass('hidden')
                            $('.comment-text').removeClass('hidden')
                            $('input[name="comment"]').val('');
                            $('.comment-count').html(response.comments.length)
                            commentsData(response)
                        }
                    }
                })

            })




            document.querySelectorAll('.upload-time').forEach((item, index) => {
                item.innerHTML = moment(item.innerHTML).fromNow()
            })

            const mainVideo = document.getElementById('mainVideoPlayer');
            const videoSource = document.getElementById('videoSource');
            const videoTitleEl = document.getElementById('videoTitle');
            const videoViewsEl = document.getElementById('videoViews');
            const videoDateEl = document.getElementById('videoDate');
            const playlistContainer = document.getElementById('playlistContainer');
            const commentsContainer = document.getElementById('commentsContainer');
            const commentCountSpan = document.getElementById('commentCount');
            const commentInput = document.getElementById('commentInput');
            const cancelCommentBtn = document.getElementById('cancelCommentBtn');
            const descShortEl = document.getElementById('descShort');
            const descFullEl = document.getElementById('descFull');
            const toggleDescBtn = document.getElementById('toggleDescBtn');
            let descriptionExpanded = false;

            function updateDescription(video) {
                if (video.descriptionShort && video.descriptionFull) {
                    descShortEl.innerText = video.descriptionShort;
                    descFullEl.innerText = video.descriptionFull;
                } else {
                    descShortEl.innerText = video.descriptionShort || "No description available.";
                    descFullEl.innerText = video.descriptionFull || "Additional details not provided.";
                }
                descriptionExpanded = false;
                descFullEl.classList.add('hidden');
                toggleDescBtn.innerText = "Show more";
            }

            function toggleDescription() {
                if (descriptionExpanded) {
                    descFullEl.classList.add('hidden');
                    toggleDescBtn.innerText = "Show more";
                    descriptionExpanded = false;
                } else {
                    descFullEl.classList.remove('hidden');
                    toggleDescBtn.innerText = "Show less";
                    descriptionExpanded = true;
                }
            }

            function updateMainVideo(video) {
                currentVideo = video;
                videoSource.src = video.src;
                mainVideo.load();
                mainVideo.play().catch(e => console.log("Autoplay blocked, but user can play"));
                videoTitleEl.innerText = video.title;
                videoViewsEl.innerHTML = `<i class="fas fa-eye"></i> ${video.views}`;
                videoDateEl.innerHTML = `<i class="far fa-calendar-alt"></i> ${video.date}`;
                updateDescription(video);
                renderPlaylist();
            }


            card.addEventListener('click', (e) => {
                e.preventDefault();
                updateMainVideo(video);
                const mainScrollArea = document.querySelector('.main-scroll-area');
                if (mainScrollArea && window.innerWidth < 1024) {
                    const videoContainer = document.querySelector('.bg-black.rounded-xl');
                    if (videoContainer) videoContainer.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });


            function renderComments() {
                commentsContainer.innerHTML = '';
                if (commentsArray.length === 0) {
                    commentsContainer.innerHTML =
                        `<div class="text-center text-yt-gray py-6">No comments yet. Be the first to comment!</div>`;
                    commentCountSpan.innerText = `(0)`;
                    return;
                }
                commentCountSpan.innerText = `(${commentsArray.length})`;
                commentsArray.forEach(comment => {
                    const commentDiv = document.createElement('div');
                    commentDiv.className = "flex gap-3 pb-3 border-b border-gray-800";
                    commentDiv.innerHTML = `
        <div class="w-8 h-8 rounded-full bg-yt-red flex-shrink-0 flex items-center justify-center text-white text-xs font-bold">${comment.username.charAt(0).toUpperCase()}</div>
        <div class="flex-1">
          <div class="flex items-center gap-2 flex-wrap">
            <span class="text-white text-sm font-semibold">${escapeHtml(comment.username)}</span>
            <span class="text-yt-gray text-xs">${comment.timestamp}</span>
          </div>
          <p class="text-gray-200 text-sm mt-1">${escapeHtml(comment.text)}</p>
          <div class="flex items-center gap-4 mt-1">
            <button class="comment-like-btn text-yt-gray text-xs hover:text-white transition flex items-center gap-1"><i class="far fa-thumbs-up"></i> ${comment.likes}</button>
            <button class="text-yt-gray text-xs hover:text-white transition"><i class="far fa-comment-dots"></i> Reply</button>
          </div>
        </div>
      `;
                    const likeBtn = commentDiv.querySelector('.comment-like-btn');
                    likeBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        comment.likes += 1;
                        renderComments();
                    });
                    commentsContainer.appendChild(commentDiv);
                });
            }

            function escapeHtml(str) {
                if (!str) return '';
                return str.replace(/[&<>]/g, function(m) {
                    if (m === '&') return '&amp;';
                    if (m === '<') return '&lt;';
                    if (m === '>') return '&gt;';
                    return m;
                }).replace(/[\uD800-\uDBFF][\uDC00-\uDFFF]/g, function(c) {
                    return c;
                });
            }

            function addComment(text) {
                if (!text.trim()) return;
                const newComment = {
                    id: Date.now(),
                    username: "CurrentUser",
                    text: text.trim(),
                    timestamp: "Just now",
                    likes: 0
                };
                commentsArray.unshift(newComment);
                renderComments();
                commentInput.value = '';
            }
            cancelCommentBtn.addEventListener('click', (e) => {
                commentInput.value = '';
                e.preventDefault();
            });

            const likeBtnMain = document.querySelector('.like-btn');
            const dislikeBtnMain = document.querySelector('.dislike-btn');
            let liked = false;
            let disliked = false;
            if (likeBtnMain) {
                likeBtnMain.addEventListener('click', () => {
                    if (!liked) {
                        likeBtnMain.innerHTML = '<i class="fas fa-thumbs-up"></i> 12.1K';
                        likeBtnMain.classList.add('text-yt-red');
                        if (disliked) {
                            disliked = false;
                            dislikeBtnMain.innerHTML = '<i class="far fa-thumbs-down"></i> Dislike';
                            dislikeBtnMain.classList.remove('text-yt-red');
                        }
                        liked = true;
                    } else {
                        likeBtnMain.innerHTML = '<i class="far fa-thumbs-up"></i> 12K';
                        likeBtnMain.classList.remove('text-yt-red');
                        liked = false;
                    }
                });
            }
            if (dislikeBtnMain) {
                dislikeBtnMain.addEventListener('click', () => {
                    if (!disliked) {
                        dislikeBtnMain.innerHTML = '<i class="fas fa-thumbs-down"></i> Dislike';
                        dislikeBtnMain.classList.add('text-yt-red');
                        if (liked) {
                            liked = false;
                            likeBtnMain.innerHTML = '<i class="far fa-thumbs-up"></i> 12K';
                            likeBtnMain.classList.remove('text-yt-red');
                        }
                        disliked = true;
                    } else {
                        dislikeBtnMain.innerHTML = '<i class="far fa-thumbs-down"></i> Dislike';
                        dislikeBtnMain.classList.remove('text-yt-red');
                        disliked = false;
                    }
                });
            }
            videoLibrary.forEach(v => {
                if (!v.thumbnail || v.thumbnail === '') {
                    v.thumbnail = `https://picsum.photos/seed/${v.id}/320/180`;
                }
            });
            toggleDescBtn.addEventListener('click', toggleDescription);

            function init() {
                renderPlaylist();
                renderComments();
                updateMainVideo(videoLibrary[0]);
                mainVideo.load();
                mainVideo.play().catch(e => console.log("Autoplay blocked"));
            }
            init();
        </script>
    </body>

</x-layout>
