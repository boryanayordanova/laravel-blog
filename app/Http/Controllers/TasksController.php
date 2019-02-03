<?php

namespace App\Http\Controllers;
use App\Task;

class TasksController extends Controller {

	public function index() {
		$tasks = Task::all();
		return view('tasks.index', compact('tasks'));
	}

	/*
		public function show($id) {
			$task = Task::find($id);
			return view('tasks.show', compact('task'));
	*/

	//insted of the function above
	public function show(Task $task) {
		return $task; //shows json on the browser
		//$task = Task::find($id);
		//return view('tasks.show', compact('task'));
	}

}
