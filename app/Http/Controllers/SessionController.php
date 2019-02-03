<?php

namespace App\Http\Controllers;

class SessionController extends Controller {

	public function __construct() {

		//if the user is already loged-in he shouldn't see the login page again so add
		//only guests are allower to go thought that filter
		//$this->middleware('guest', ["except" => "destroy"]);
		$this->middleware('guest', ["except" => "destroy"]);

	}

	public function create() {

		return view("sessions.create");
	}

	public function store() {

		//sign them in
		if (!auth()->attempt(request(["email", "password"]))) {
			return back()->withErrors([
				"message" => "Please chech your credentials and try again later",
			]);
		}

		return redirect()->home();

	}

	public function destroy() {
		auth()->logout();
		//Session::flush();
		return redirect()->home();

	}
}
