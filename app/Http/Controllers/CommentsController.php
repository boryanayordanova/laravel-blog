<?php

namespace App\Http\Controllers;

use App\Post2;
use Illuminate1\Http\Request;

class CommentsController extends Controller {

	public function store(Post2 $post) {

		//validation:
		$this->validate(request(), ["body" => "required|max:200"]);

		$post->addComment(request("body"));

		/* without function:
			Comment::create([
				'body' => request("body"),
				"post2_id" => $post->id,

			]);
		*/

		return back();

	}
}
