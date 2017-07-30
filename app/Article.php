<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
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
