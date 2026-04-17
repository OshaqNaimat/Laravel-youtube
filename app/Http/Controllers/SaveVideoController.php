<?php

namespace App\Http\Controllers;

use App\Models\SavedVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveVideoController extends Controller
{
    public function saveVideo(Request $req)
    {
        // Check user
        $user = Auth::user();

        if (! $user) {
            return response()->json(['status' => 'guest']);
        }

        $videoId = $req->input('video_id');
        $userId = $user->id;

        // Check if already saved
        $exists = SavedVideo::where('user_id', $userId)
            ->where('video_id', $videoId)
            ->first();

        if ($exists) {
            // Unsave
            $exists->delete();

            return response()->json([
                'saved' => false,
                'message' => 'Removed from saved',
            ]);
        } else {
            // Save
            SavedVideo::create([
                'user_id' => $userId,
                'video_id' => $videoId,
            ]);

            return response()->json([
                'saved' => true,
                'message' => 'Video saved',
            ]);
        }
    }

    public function savedVideosPage()
    {
        $user = Auth::user();

        if (! $user) {
            return redirect('/register');
        }

        $videos = SavedVideo::where('user_id', $user->id)
            ->with('video')
            ->orderBy('id', 'desc')
            ->get();

        return view('saved-video', compact('videos'));
    }
}
