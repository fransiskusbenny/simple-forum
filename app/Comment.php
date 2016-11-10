<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	use Likeable;

    protected $fillable = [
		'body'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function topic()
	{
		return $this->belongsTo(Topic::class);
	}

	public static function from(User $user) 
	{
		$comment = new static;

		$comment->user_id = $user->id;

		return $comment;
	}

	
	public function make(array $data, Topic $topic)
	{
		$this->fill([
			'body' => $data['comment']
		]);

		$this->topic()->associate($topic)->save();

		$topic->touch();

		return $this;
	}
}
