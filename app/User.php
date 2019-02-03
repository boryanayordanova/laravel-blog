<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function postfunction() {
		return $this->hasMany(Post2::class);
	}

	public function publish(Post2 $post) {
		/* copied before creating the function publish() on Post2Controller.php
			Post2::create([
				"title" => request("title"),
				"body" => request("body"),
				"user_id" => auth()->id(),
			]);
		*/

		$this->postfunction()->save($post);
	}
}
