<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    // Tell Laravel the table name
    protected $table = 'subscriptions';

    // Mass assignable fields
    protected $fillable = ['subscriber_id', 'channel_id'];

    // Relationships
    public function subscriber()
    {
        return $this->belongsTo(User::class, 'subscriber_id');
    }

    public function channel()
    {
        return $this->belongsTo(User::class, 'channel_id');
    }
}
