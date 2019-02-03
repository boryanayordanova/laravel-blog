<?php

namespace App\Repositories;
use App\Post2;
use App\Redis;

class Post2s {

	protected $redis;

	public function __constructor(Redis $redis) {

		$this->redis = $redis;

	}

	public function all() {

		return Post2::all();

	}

}