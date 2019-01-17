<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);

		$faker = Faker\Factory::create('it_IT');

		App\Category::create([

			'name' => 'Coding',
			'slug' => 'coding',
			'description' => $faker->paragraph(3),

		]);

		App\Category::create([

			'name' => 'Personal',
			'slug' => 'personal',
			'description' => $faker->paragraph(3),

		]);

	}
}
