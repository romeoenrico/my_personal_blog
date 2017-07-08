<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);
		$this->call('UserTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('ArticleTableSeeder');

	}
}
