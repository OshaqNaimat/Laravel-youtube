<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
     public function vidoes(){
        return $this->belongsTo(Videos::class,'video_id');
    }
}
