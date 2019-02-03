<?php
namespace App\Http\Controllers;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller {

	public function create() {
		return view("registration.create");
	}

	public function store(RegistrationRequest $request) {
		//validate the form

		//removed after copied to the RegistrationRequest.php reles();
		// $this->validate(request(), [
		// 	"name" => "required",
		// 	"email" => "required|email",
		// 	"password" => "required|confirmed",
		// ]);

		//create and save the user
		//$user = User::create(request(["name", "email", "password"]));
		/*		$user = User::create([
			'name' => request('name'),
			'email' => request('email'),
			'password' => \Hash::make(request('password')),

		]);

		//sign them in
		auth()->login($user);

		\Mail::to($user)->send(new Welcome($user));*/

		$request->persist();

		//session('message', 'Here is the default message');

		session()->flash('successMsg', 'Registration succesfully!');

		//redirect to the home page
		return redirect()->home();
	}
}