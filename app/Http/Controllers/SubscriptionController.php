<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function toggle(Request $request)
    {
        $user = Auth::user();
        $channelId = $request->channel_id;

        if ($user->id == $channelId) {
            return response()->json(['error' => 'You cannot subscribe to yourself'], 403);
        }

        $subscription = Subscriber::where('subscriber_id', $user->id)
            ->where('channel_id', $channelId)
            ->first();

        if ($subscription) {
            $subscription->delete();
            $status = 'unsubscribed';
        } else {
            Subscriber::create([
                'subscriber_id' => $user->id,
                'channel_id' => $channelId,
            ]);
            $status = 'subscribed';
        }

        $count = Subscriber::where('channel_id', $channelId)->count();

        return response()->json([
            'status' => $status,
            'count' => $count,
        ]);
    }
}
