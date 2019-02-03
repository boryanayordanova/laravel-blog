<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	public function posts() {

		return $this->belongsToMany(Post2::class);

	}

	public function getRouteKeyName() {

		return "name";

	}

}
