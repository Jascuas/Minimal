<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{

public function followers()
{
    return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
}

}
