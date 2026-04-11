<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedVideos extends Model
{
    public function userSaved()
    {
        return $this->belongsTo(User::class);
    }

    public function videoSaved()
    {
        return $this->belongsTo(Videos::class);
    }
}
