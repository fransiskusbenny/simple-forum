<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Topic;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store(Topic $topic, Request $request)
    {
    	$this->validate($request, [
    		'comment' => 'required|min:8'
		]);

		Comment::from(\Auth::user())
			->make($request->all(), $topic);

		return back();
    }
}
