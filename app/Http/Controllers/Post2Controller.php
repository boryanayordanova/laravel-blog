<?php

namespace App\Http\Controllers;
use App\Post2;
use Illuminate\Http\Request;

class Post2Controller extends Controller {

	public function __construct() {
		//$this->middleware('auth')->except(["index", "show"]);
		$this->middleware('auth', ['except' => ['index', 'show']]);
		//$this->middleware('guest'); //returns to home page

	}

	public function index( /*\App\Tag $tag = null*/) {

		//return $tag 		//return the tag
		//return $tag->posts; //returns the posts associated with the tasg

		$posts = Post2::latest()
			->filter(request(['month', 'year']))
			->get();

		return view('posts2.index', compact('posts'));

	}

	public function show(Post2 $post) {
		return view("posts2.show", compact('post'));
	}

	public function create() {
		return view("posts2.create");
	}

	public function store() {

		//dd(request()->all());
		//or dd(request("title"));
		//or dd(request("body"));
		//or dd(request(['title', 'body']));

		//create a new post using the request data
		//		$post = new Post2;
		//$post->title = request("title");
		//$post->body = request("body");

		//save it to the db
		//$post->save();

		/*
			Post2::create([
			'title' => request("title"),
			'body' => request("body"),
			]);
		*/
		$this->validate(request(), [
			'title' => 'required',
			'body' => 'required',
		]);

		//create and save the user
		//Post2::create(request(["title", "body"]));

		/*
			Post2::create([
				"title" => request("title"),
				"body" => request("body"),
				"user_id" => auth()->id(),
			]);
			OR replace with new function, which we will declarate on User.php
		*/

		auth()->user()->publish(
			new Post2(request(['title', 'body']))
		);

		session()->flash('successMsg', 'Post is published');

		//and then redirect to the home page
		//return redirect("/");
		return redirect()->home();

	}

}
