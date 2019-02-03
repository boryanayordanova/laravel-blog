<?php

namespace App\Http\Controllers;

use App\Tag;

class TagsController extends Controller {

	public function index(Tag $tag) {

		//return $tag;
		$posts = $tag->posts;

		return view("posts2.index", compact("posts"));

	}
}
