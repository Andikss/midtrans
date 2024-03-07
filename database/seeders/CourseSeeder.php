<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker      = Faker::create();
        $categories = ['code', 'logic', 'science'];

        foreach($categories as $category) {
            CourseCategory::create([
                'name' => $category
            ]);
        }

        foreach (range(1, 20) as $index) {
            Course::create([
                'name'         => $faker->word,
                'description'  => 'lorem ipsum dolor',
                'price'        => $faker->numberBetween(100, 1000),
                'category_id'  => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
