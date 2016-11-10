<?php

namespace App;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	use Sluggable, Likeable;

	protected $fillable = [
		'title', 'content', 'category_id'
	];

    protected $with = ['creator', 'comments'];

	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

	public static function from(User $user) 
	{
		$topic = new static;

		$topic->user_id = $user->id;

		return $topic;
	}	


	public function add(array $data) 
	{
		$this->fill([
			'title' => $data['title'],
			'content' => $data['content'],
			'category_id' => $data['category']
		])->save();

		return $this;
	}

}
