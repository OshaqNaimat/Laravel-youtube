<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\User;
use App\Models\VideoLike;
use App\Models\Videos;
use App\Models\Views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function uploadVideo(Request $req)
    {
        $formFields = [
            'title' => $req->input('title'),
            'description' => $req->input('description'),
            'video' => $req->input('video'),
            'thumbnail' => $req->input('thumbnail'),
            'visibility' => $req->input('visibility'),
        ];

        $formFields['video'] = $req->file('video')->store('videos', 'public');
        $formFields['thumbnail'] = $req->file('thumbnail')->store('thumbnail', 'public');
        $formFields['user_id'] = Auth::id();
        //    store the data in the database

        Videos::create($formFields);

        //  redirection

        return back()->with('message', 'Video Published Successfully');

    }

    public function getVideos()
    {

        $allVideos = Videos::with('views')->get();

        return view('welcome', compact('allVideos'));
    }

    // public function getSinglePageVideos(){
    //     $allSingleVideos = Videos::all();
    //      return view('single-video',compact('allSingleVideos'));
    // }

    public function getSingleVideo($id)
    {
        $allSingleVideos = Videos::with('views')->get();
        $video = Videos::find($id);

        $videoViews = Views::where('video_id', $id)->first();
        if (! $videoViews) {
            Views::create([
                'views' => 1,
                'video_id' => $id,
            ]);
        } else {
            $videoViews->increment('views');
        }

        $uploader = User::find($video->user_id);

        // Get subscribers for the uploader
        $videoSubscribers = Subscriber::where('channel_id', $uploader->id)->get();

        // variables ko alag comma se separate karein
        return view('single-video', compact('video', 'allSingleVideos', 'videoViews', 'videoSubscribers', 'uploader'));
    }

    public function searchedItems(Request $req)
    {
        $search = $req->input('searchTerm');
        $videos = Videos::select('title')->where('title', 'LIKE', '%'.$search.'%')->distinct()->get();

        return response()->json([
            'videos' => $videos,
        ]);
    }

    public function relaventItems(Request $req)
    {
        $videos = Videos::where('title', $req->input('title'))->with(['user', 'views'])->get();

        return response()->json([
            'videos' => $videos,
        ]);
    }

    // likes cotroller

    public function likeVideo(Request $request)
    {
        $user = Auth::user();
        $videoId = $request->video_id;
        $action = $request->action; // 'like' or 'dislike'

        if (! $user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $like = VideoLike::where('user_id', $user->id)
            ->where('video_id', $videoId)
            ->first();

        if ($like) {
            if (($action === 'like' && $like->is_like) || ($action === 'dislike' && ! $like->is_like)) {
                // Undo the same action
                $like->delete();
                $liked = $disliked = false;
            } else {
                // Switch action
                $like->is_like = $action === 'like';
                $like->save();
                $liked = $action === 'like';
                $disliked = $action === 'dislike';
            }
        } else {
            // Create new like/dislike
            VideoLike::create([
                'user_id' => $user->id,
                'video_id' => $videoId,
                'is_like' => $action === 'like',
            ]);
            $liked = $action === 'like';
            $disliked = $action === 'dislike';
        }

        // Counts
        $likeCount = VideoLike::where('video_id', $videoId)->where('is_like', true)->count();
        $dislikeCount = VideoLike::where('video_id', $videoId)->where('is_like', false)->count();

        return response()->json([
            'liked' => $liked,
            'disliked' => $disliked,
            'likeCount' => $likeCount,
            'dislikeCount' => $dislikeCount,
        ]);
    }

    public function showLikedVideos()
    {
        // Get only the likes belonging to the logged-in user where is_like is true (1)
        $videos = VideoLike::where('user_id', Auth::id())->where('is_like', true)
            ->with(['video.user']) // Eager load the video and the uploader
            ->latest()
            ->get();

        return view('liked-videos', compact('videos'));
    }

    // getting the logged in user's videos
    public function myVideos()
    {
        // Fetch videos where user_id is the logged-in user
        $videos = Videos::where('user_id', Auth::id())
            ->with(['views', 'user']) // Eager load views and user for the count/name
            ->latest()
            ->get();

        return view('my-videos', compact('videos'));
    }
}
