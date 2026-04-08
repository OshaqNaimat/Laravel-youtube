<x-layout>
    <!-- Custom config to override default theme and add red/black vibe -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'yt-red': '#E01E2E',
                        'yt-dark': '#0A0A0A',
                        'yt-card': '#121212',
                        'yt-sidebar': '#1A1A1A',
                        'yt-text': '#E5E5E5',
                        'yt-gray': '#AAAAAA',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        /* custom scrollbar - match red/black theme, only ONE vertical overflow */
        body {
            background-color: #0A0A0A;
            font-family: 'Inter', sans-serif;
        }

        /* global custom scrollbar (only on y-scroll container) */
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

        /* hide default body scroll to enforce only ONE scroll inside main container */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        /* main layout uses flex column, but inner main area has overflow-y auto */
        #app {
            height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #0A0A0A;
        }

        /* header fixed no scroll */
        .top-header {
            flex-shrink: 0;
        }

        /* main content area: takes full height minus header, provides single scroll */
        .main-scroll-area {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* video thumbnail hover effect */
        .video-card {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .video-card:hover {
            background-color: #2A2A2A;
            transform: translateX(2px);
        }

        /* active video highlight */
        .active-video {
            background: #2C0F12;
            border-left: 3px solid #E01E2E;
        }

        /* responsive adjustments */
        @media (max-width: 768px) {
            .sidebar-playlist {
                margin-top: 1rem;
            }
        }

        /* comment & description input focus */
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

        /* description expand/collapse smooth */
        .desc-content {
            transition: all 0.2s ease;
        }

        .show-more-btn {
            cursor: pointer;
            font-weight: 500;
        }
    </style>
    </head>

    <body>
        <div id="app">
            <!-- navbar -->
            <x-navbar />


            <!-- MAIN SCROLLABLE AREA: only one overflow-y scroll (entire content except header) -->
            <div class="main-scroll-area custom-scroll">
                <div class="max-w-[1600px] mx-auto px-4 md:px-6 py-5">
                    <!-- Two column layout: left (big video + description + comments) and right (playlist) -->
                    <div class="flex flex-col lg:flex-row gap-6">
                        <!-- LEFT COLUMN: main video area + description + comments -->
                        <div class="lg:w-2/3 w-full">
                            <!-- video player container (big) -->
                            <div class="bg-black rounded-xl overflow-hidden shadow-2xl border border-gray-800">
                                <video src="{{ asset('storage/' . $video->video) }}" controls autoplay
                                    class="w-full max-h-[80vh] object-contain">
                                </video>
                            </div>

                            <!-- video title & meta (redish/black) -->
                            <div class="mt-4 border-b border-gray-800 pb-3">
                                <h1 id="videoTitle" class="text-white text-xl md:text-2xl font-semibold leading-tight">
                                    Epic
                                    Cinematic Journey</h1>
                                <div class="flex flex-wrap justify-between items-center mt-2">
                                    <div class="flex items-center gap-3 text-yt-gray text-sm">
                                        <span id="videoViews" class="flex items-center gap-1"><i class="fas fa-eye"></i>
                                            1.2M views</span>
                                        <span id="videoDate" class="flex items-center gap-1"><i
                                                class="far fa-calendar-alt"></i> 2 days ago</span>
                                    </div>
                                    <div class="flex items-center gap-3 mt-2 sm:mt-0">
                                        <button
                                            class="like-btn flex items-center gap-2 bg-yt-sidebar px-4 py-1.5 rounded-full text-yt-gray hover:text-white transition"><i
                                                class="far fa-thumbs-up"></i> 12K</button>
                                        <button
                                            class="dislike-btn flex items-center gap-2 bg-yt-sidebar px-4 py-1.5 rounded-full text-yt-gray hover:text-white transition"><i
                                                class="far fa-thumbs-down"></i> Dislike</button>
                                        <button
                                            class="flex items-center gap-2 bg-yt-sidebar px-4 py-1.5 rounded-full text-yt-gray hover:text-white transition"><i
                                                class="fas fa-share"></i> Share</button>
                                    </div>
                                </div>
                            </div>

                            <!-- channel info row -->
                            <div
                                class="flex items-center justify-between mt-4 bg-yt-card p-3 rounded-xl border border-gray-800">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-yt-red flex items-center justify-center text-white font-bold">
                                        R</div>
                                    <div>
                                        <p class="text-white font-semibold">Redux Media <span
                                                class="text-yt-gray text-xs ml-1">● 2.3M subscribers</span></p>
                                        <p class="text-yt-gray text-xs">Creator of cinematic experiences</p>
                                    </div>
                                </div>
                                <button
                                    class="bg-yt-red hover:bg-red-700 text-white px-5 py-1.5 rounded-full text-sm font-medium transition">Subscribe</button>
                            </div>

                            <!-- ========== DESCRIPTION SECTION (new) ========== -->
                            <div class="mt-5 bg-yt-card rounded-xl border border-gray-800 overflow-hidden">
                                <div class="p-4">
                                    <div
                                        class="flex items-center gap-2 text-white font-semibold border-b border-gray-700 pb-2 mb-3">
                                        <i class="fas fa-align-left text-yt-red"></i>
                                        <span>Description</span>
                                    </div>
                                    <div id="descriptionContainer" class="text-yt-gray text-sm leading-relaxed">
                                        <!-- dynamic description will be injected here -->
                                        <div id="descShort" class="desc-content"></div>
                                        <div id="descFull" class="desc-content hidden mt-2"></div>
                                        <button id="toggleDescBtn"
                                            class="show-more-btn text-yt-red text-xs mt-2 hover:underline focus:outline-none">Show
                                            more</button>
                                    </div>
                                </div>
                            </div>

                            <!-- COMMENTS SECTION (integrated into the same scroll flow) -->
                            <div class="mt-6 bg-yt-card rounded-xl p-4 border border-gray-800">
                                <div class="flex items-center gap-3 border-b border-gray-700 pb-3 mb-4">
                                    <i class="far fa-comment-dots text-yt-red text-xl"></i>
                                    <h3 class="text-white font-semibold text-lg">Comments <span id="commentCount"
                                            class="text-yt-gray ml-1">(24)</span></h3>
                                </div>
                                <!-- add comment input -->
                                <div class="flex gap-3 mb-6">
                                    <div
                                        class="w-9 h-9 rounded-full bg-yt-red flex-shrink-0 flex items-center justify-center text-white text-sm">
                                        U</div>
                                    <div class="flex-1">
                                        <input type="text" id="commentInput" placeholder="Add a public comment..."
                                            class="comment-input w-full bg-yt-sidebar border border-gray-700 rounded-full px-4 py-2 text-white placeholder-gray-400 focus:border-yt-red transition">
                                        <div class="flex justify-end gap-2 mt-2">
                                            <button id="cancelCommentBtn"
                                                class="text-yt-gray text-sm px-3 py-1 rounded-full hover:bg-gray-800">Cancel</button>
                                            <button id="postCommentBtn"
                                                class="bg-yt-red hover:bg-red-700 text-white text-sm px-4 py-1 rounded-full font-medium transition">Comment</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- comments list -->
                                <div id="commentsContainer"
                                    class="space-y-4 max-h-[350px] overflow-y-auto custom-scroll pr-1">
                                    <!-- sample comments injected -->
                                </div>
                            </div>
                        </div>

                        <!-- RIGHT COLUMN: video playlist (scrolls within main scroll area, but it's part of main scroll flow - no separate overflow) -->
                        <div class="lg:w-1/3  w-full">
                            {{-- resources/views/components/video-sidebar.blade.php --}}

                            {{-- <x-allvideos /> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // ---------- VIDEO DATA (sample library with titles, sources, views, dates, descriptions) ----------

            // initial selected video (first one)


            // Comments array (initial mock data)
            let commentsArray = [{
                    id: 1,
                    username: "PixelWarrior",
                    text: "Absolutely stunning visuals! The red theme makes it pop 🔥",
                    timestamp: "2 hours ago",
                    likes: 34
                },
                {
                    id: 2,
                    username: "CinephilePro",
                    text: "This channel never disappoints. Great quality content!",
                    timestamp: "5 hours ago",
                    likes: 12
                },
                {
                    id: 3,
                    username: "TechSavvy",
                    text: "Love the UI design, very clean and modern. Keep it up!",
                    timestamp: "1 day ago",
                    likes: 56
                },
                {
                    id: 4,
                    username: "RetroGamer",
                    text: "That playlist on the side is super helpful. Nice work!",
                    timestamp: "2 days ago",
                    likes: 8
                },
            ];

            // DOM Elements
            const mainVideo = document.getElementById('mainVideoPlayer');
            const videoSource = document.getElementById('videoSource');
            const videoTitleEl = document.getElementById('videoTitle');
            const videoViewsEl = document.getElementById('videoViews');
            const videoDateEl = document.getElementById('videoDate');
            const playlistContainer = document.getElementById('playlistContainer');
            const commentsContainer = document.getElementById('commentsContainer');
            const commentCountSpan = document.getElementById('commentCount');
            const commentInput = document.getElementById('commentInput');
            const postCommentBtn = document.getElementById('postCommentBtn');
            const cancelCommentBtn = document.getElementById('cancelCommentBtn');

            // Description elements
            const descShortEl = document.getElementById('descShort');
            const descFullEl = document.getElementById('descFull');
            const toggleDescBtn = document.getElementById('toggleDescBtn');
            let descriptionExpanded = false;

            // Helper: update description based on current video
            function updateDescription(video) {
                if (video.descriptionShort && video.descriptionFull) {
                    descShortEl.innerText = video.descriptionShort;
                    descFullEl.innerText = video.descriptionFull;
                } else {
                    // fallback
                    descShortEl.innerText = video.descriptionShort || "No description available.";
                    descFullEl.innerText = video.descriptionFull || "Additional details not provided.";
                }
                // reset to collapsed state when video changes
                descriptionExpanded = false;
                descFullEl.classList.add('hidden');
                toggleDescBtn.innerText = "Show more";
            }

            // toggle description expand/collapse
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

            // Helper: update main video player (big left side)
            function updateMainVideo(video) {
                currentVideo = video;
                // change video source and reload
                videoSource.src = video.src;
                mainVideo.load();
                mainVideo.play().catch(e => console.log("Autoplay blocked, but user can play"));
                videoTitleEl.innerText = video.title;
                videoViewsEl.innerHTML = `<i class="fas fa-eye"></i> ${video.views}`;
                videoDateEl.innerHTML = `<i class="far fa-calendar-alt"></i> ${video.date}`;
                // update description
                updateDescription(video);
                // re-render playlist to highlight active video
                renderPlaylist();
            }

            // Render playlist (right sidebar)
            //             function renderPlaylist() {
            //                 playlistContainer.innerHTML = '';
            //                 videoLibrary.forEach(video => {
            //                     const isActive = currentVideo.id === video.id;
            //                     const activeClass = isActive ? 'active-video bg-opacity-40 border-l-yt-red' :
            //                         'border-l-transparent';
            //                     const card = document.createElement('div');
            //                     card.className =
            //                         `video-card flex gap-3 p-2 rounded-lg transition-all ${isActive ? 'active-video bg-[#2C0F12]' : 'bg-yt-card hover:bg-[#1F1F1F]'} border-l-3`;
            //                     card.style.borderLeftColor = isActive ? '#E01E2E' : 'transparent';
            //                     card.style.borderLeftWidth = '3px';
            //                     card.innerHTML = `
    //     <div class="relative w-40 flex-shrink-0 rounded-md overflow-hidden bg-black">
    //       <img src="${video.thumbnail || 'https://via.placeholder.com/120x68?text=Thumb'}" class="w-full h-full object-cover aspect-video" alt="thumbnail">
    //       <span class="absolute bottom-1 right-1 bg-black/80 text-white text-[10px] px-1 rounded">${video.duration}</span>
    //     </div>
    //     <div class="flex-1">
    //       <p class="text-white text-sm font-medium line-clamp-2">${video.title}</p>
    //       <p class="text-yt-gray text-xs mt-1 flex items-center gap-1"><i class="fas fa-eye"></i> ${video.views}</p>
    //       <p class="text-yt-gray text-xs">${video.date}</p>
    //     </div>
    //   `;
            card.addEventListener('click', (e) => {
                e.preventDefault();
                updateMainVideo(video);
                // scroll to top of left column on mobile for better UX
                const mainScrollArea = document.querySelector('.main-scroll-area');
                if (mainScrollArea && window.innerWidth < 1024) {
                    const videoContainer = document.querySelector('.bg-black.rounded-xl');
                    if (videoContainer) videoContainer.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
            playlistContainer.appendChild(card);
            });
            }

            // Render comments list (with like button simulation)
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

            // simple escape to avoid XSS
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

            // add new comment
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

            // event listeners for comments
            postCommentBtn.addEventListener('click', () => {
                addComment(commentInput.value);
            });
            cancelCommentBtn.addEventListener('click', () => {
                commentInput.value = '';
            });
            commentInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addComment(commentInput.value);
                }
            });

            // Like/Dislike handlers for main video (cosmetic)
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

            // thumbnail fallback for any missing
            videoLibrary.forEach(v => {
                if (!v.thumbnail || v.thumbnail === '') {
                    v.thumbnail = `https://picsum.photos/seed/${v.id}/320/180`;
                }
            });

            // initialize description toggle listener
            toggleDescBtn.addEventListener('click', toggleDescription);

            // initial load: set default video + render playlist + comments + description
            function init() {
                renderPlaylist();
                renderComments();
                updateMainVideo(videoLibrary[0]);
                // set autoplay attempt
                mainVideo.load();
                mainVideo.play().catch(e => console.log("Autoplay blocked"));
            }

            init();
        </script>
    </body>

</x-layout>
