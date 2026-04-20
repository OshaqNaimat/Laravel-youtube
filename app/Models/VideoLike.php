<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoLike extends Model
{
    protected $fillable = ['user_id', 'video_id', 'is_like'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        // return $this->belongsTo(Videos::class);

        return $this->belongsTo(Videos::class, 'video_id');

    }

    // Inside your Video (or Videos) model
    public function likes()
    {
        return $this->hasMany(VideoLike::class, 'video_id')->where('is_like', 1);
    }

    public function views()
    {
        return $this->hasMany(Views::class, 'video_id');
    }
}
