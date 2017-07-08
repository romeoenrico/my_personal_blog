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

			'name' => 'News',
			'slug' => 'news',
			'description' => $faker->paragraph(3),

		]);

		App\Category::create([

			'name' => 'Reportage',
			'slug' => 'reportage',
			'description' => $faker->paragraph(3),

		]);

	}
}
