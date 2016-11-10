<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicsForm;
use App\Topic;

class TopicsController extends Controller
{

	public function __construct() 
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	public function index()
	{
		$topics = Topic::orderBy('updated_at','desc')->paginate(20);

		return view('topics.index', compact('topics'));
	}

	public function show(Topic $topic)
	{
		$comments = $topic->comments()->paginate(15);

		return view('topics.show', compact('topic', 'comments'));
	}

	public function create()
	{
		$categories = \DB::table('categories')->orderBy('name')->get();

		return view('topics.create')
			->withCategories($categories);
	}

	public function store(TopicsForm $request)
	{
		Topic::from(\Auth::user())
			->add($request->all());

		return redirect('/');
	}
}
