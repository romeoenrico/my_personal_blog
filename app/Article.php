<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	public static function createFromData($title, $body, $is_published,
	$meta_description, $meta_keys) {

         $article = new self();
         $article->title = $title;
         $article->body = $body;
				 $article->is_published = $is_published;
         $article->meta_description = $meta_description;
				 $article->meta_keys = $meta_keys;
         $article->published_at = null;
         return $article;

  }

	public function isPublished() {

		return !is_null($this->published_at);

	}

	public function publish($publicationDate)	{

		$this->published_at = $publicationDate;

	}

public function unpublish()	{

		$this->published_at = null;

}


	public function user() {

		return $this->belongsTo('App\User');

	}

	public function categories() {

		return $this->belongsToMany('App\Category');

	}

	public function scopeFilter($query, $filters) {
		if ($month = $filters['month']) {
			$query->whereMonth('created_at', Carbon::parse($month)->month);
		}

		if ($year = $filters['year']) {
			$query->whereYear('created_at', Carbon::parse($year)->year);
		}

	}

	public static function archives() {

		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
			->groupBy('year', 'month')
			->orderByRaw('min(created_at) desc')
			->get()
			->toArray();

	}

}
