<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::defaultStringLength(191);
		Schema::create('tags', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->timestamps();
		});

		Schema::defaultStringLength(191);
		Schema::create('post2_tag', function (Blueprint $table) {
			$table->integer('post2_id');
			$table->integer('tag_id');
			$table->primary(['post2_id', 'tag_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('tags');
		Schema::dropIfExists('post2_tag');
	}
}
