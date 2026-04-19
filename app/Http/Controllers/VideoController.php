<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
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

        $videoSubscribers = Subscriber::where('video_id', $id);
        if (! $videoSubscribers) {
            Subscriber::create([
                'Subscriber' => 1,
                'video_id' => $id,
            ]);
        }

        // variables ko alag comma se separate karein
        return view('single-video', compact('video', 'allSingleVideos', 'videoViews', 'videoSubscribers'));
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
}
