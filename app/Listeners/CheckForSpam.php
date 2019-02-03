<?php

namespace App\Listeners;

use App\Events\ThreadCreated;

class CheckForSpam {
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  ThreadCreated  $event
	 * @return void
	 */
	public function handle(ThreadCreated $event) {
		var_dump('checking for spam');
	}
}
