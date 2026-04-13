<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    public function user(){
       return $this->belongsTo(User::class);
    }

    public function views(){
        return $this->hasMany(Views::class,'video_id');
    }

     public function subscriber(){
        return $this->hasMany(Subscriber::class,'video_id');
    }

}


