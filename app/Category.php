<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = [
		'name', 'description', 'slug',
	];

	protected $hidden = [
		'slug',
	];

	public static function createFromName($name)
 {
		 $category = new self();
		 $category->name = $name;
		 $category->slug = Str::slug($name);
		 return $category;
 }


	public function articles() {

		return $this->belongsToMany('App\Article');

	}

}
