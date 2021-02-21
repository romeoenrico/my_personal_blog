<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);

		App\User::create([

			'first_name' => 'Marco',
			'last_name' => 'Grasso',
			'slug' => 'marco_grasso',
			'email' => 'grassomarco@testtest.it',
			'password' => \Hash::make('123456'),

		]);

		App\User::create([

			'first_name' => 'Paolo',
			'last_name' => 'Rossi',
			'slug' => 'paolo_rossi',
			'email' => 'paolo.rossi@prova.it',
			'password' => \Hash::make('123456'),

		]);

	}
}
