<?php

namespace App;

trait Likeable {

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function isLiked()
    {
        return $this->likes()
                ->where('user_id', auth()->user()->id )
                ->exists();
    }

    public function liked()
    {
        $this->likes()->save(
            new Like(['user_id' => auth()->user()->id])
        );
    }

    public function disliked()
    {
        $this->likes()
            ->where('user_id', auth()->user()->id )
            ->delete();
    }
}