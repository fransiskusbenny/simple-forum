<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Topic;

class LikesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function likedTopic(Topic $topic)
    {
    	$this->liked($topic);

    	return back();
    }


    public function likedComment(Comment $comment)
    {
    	$this->liked($comment);

    	return back();
    }

    private function liked($type)
    {
        if ($type->isLiked()) {
            $type->disliked();
        } else {
            $type->liked();
        }
    }
}
