<?php

namespace App\Providers;
use App\Post2;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	protected $defer = true;

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */

	public function boot() {
		Schema::defaultStringLength(191);
		//
		//when the layout.sidebar is loaded we registrate a call-back function where we can vaint anything to that view
		view()->composer('layouts/posts2.sidebar', function ($view) {

			/*$view->with("archives", \App\Post2::archives());
			$view->with("tags", \App\Tag::has('posts')->pluck('name'));*/

			$archives = \App\Post2::archives();
			$tags = \App\Tag::has('posts')->pluck('name');
			$view->with(compact('archives', 'tags'));

		});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {

		//works
		$this->app->singleton('App\Billing\Stripe', function () {
			return new \App\Billing\Stripe(config('services.stripe.secret')); //from config/services
		});

	}
}
