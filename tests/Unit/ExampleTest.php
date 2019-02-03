<?php

namespace Tests\Unit;

use App\Post2;
use Tests\TestCase;

class ExampleTest extends TestCase {
	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function testBasicTest() {
		//$this->assertTrue(true);

		//given i have 2 records in the db that are posts and each one is posted a month apart.

		//when i fetch the archives
		Post2::archives();

		//then the responce should be in the proper format
	}
}
