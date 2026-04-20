<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedVideo extends Model
{
    protected $fillable = [
        'user_id',
        'video_id',
    ];

    public function video()
    {
        return $this->belongsTo(Videos::class);
    }

    public function views()
    {
        return $this->hasMany(Views::class, 'video_id');
    }
}
