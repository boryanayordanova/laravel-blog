<?php

namespace App;

/*use Illuminate\Database\Eloquent\Model;*/

class Comment extends Model {
	//
	public function postfunction() {
		return $this->belongsTo(Post2::class, "id");
	}

	public function userfunction() {
		return $this->belongsTo(User::class, "id");
	}
}
