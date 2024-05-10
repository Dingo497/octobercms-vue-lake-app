<?php 

namespace Banas\LakeManagement\Updates\Seeders;

use Seeder;
use Banas\LakeManagement\Models\Lake;
use Faker\Factory as Faker;

class SeedLakesTable extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Lake::create([
                'name' => $faker->word(),
                'depth' => strval($faker->randomFloat(2, 0, 100)) . ' m',
                'area' => strval($faker->randomFloat(2, 0, 500)) . ' km',
                'description' => $faker->words(12, true),
                'image' => null,
            ]);
        }
    }
}
