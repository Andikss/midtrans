<?php

namespace Database\Seeders;

use App\Models\Course;
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
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Course::create([
                'name'         => $faker->sentence,
                'description'  => 'lorem ipusm dolor',
                'image'        => $faker->imageUrl(),
                'price'        => $faker->numberBetween(100, 1000),
                'category_id'  => $faker->numberBetween(1, 5),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
