<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post2 extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title', 'body', 'user_id',
	];

	public function commentsfunction() {
		return $this->hasMany(Comment::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function addComment($body) {

		//$this->commentsfunction()->create(["body" => $body])	OR
		$this->commentsfunction()->create(compact("body"));

		/*Comment::create([
			'body' => $body,
			"post2_id" => $this->id,
		]);*/
	}

	public function scopeFilter($query, $filters) {

		if (isset($filters['month'])) {
			$month = $filters['month'];
			$query->whereMonth("created_at", Carbon::parse($month)->month); //we need to convert the month from string to int here
		}

		if (isset($filters['year'])) {
			$year = $filters['year'];
			$query->whereYear("created_at", $year);
		}

	}

	public static function archives() {

		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
			->groupBy('year', 'month')
			->orderByRaw("min(created_at) asc")
			->get()
			->toArray();

	}

	public function userfunction() {
		return $this->belongsTo(User::class, "id");
	}

	public function tags() {

		// Any post may have many tags
		// Any tag may be applied to many posts
		// => many to many

		return $this->belongsToMany(Tag::class);

	}

}
