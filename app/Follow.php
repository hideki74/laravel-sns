<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';

    public function followingIDs(int $id) {
        $followings = $this->where('follower_id', $id)->get()->toArray();
        $following_ids = [];
        foreach ($followings as $following) {
            array_push($following_ids, $following['followee_id']);
        }

        return $following_ids;
    }
}
