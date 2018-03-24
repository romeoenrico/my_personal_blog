<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Article;
use App\Category;
use App\Observers\DetachCategoriesBeforeArticleDelete;
use App\Observers\DetachArticlesWhenDeletingCategory;
use App\Observers\DeletePostImageFileWhenDeletingArticle;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {

		Article::observe(DetachCategoriesBeforeArticleDelete::class);
		Article::observe(DeletePostImageFileWhenDeletingArticle::class);
		Category::observe(DetachArticlesWhenDeletingCategory::class);

		Schema::defaultStringLength(191);

		view()->composer('frontend.master.layout', function ($view) {

			$view->with('categories', \App\Category::all());
			$view->with('articles', \App\Article::orderBy('id', 'desc')->take(5)->get());
			$view->with('archives', \App\Article::archives());

		});

		//view()->composer('backend.master.layout', function ($view) {

		//	$view->with('currentUser', Auth::user()->first_name);

		//});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
