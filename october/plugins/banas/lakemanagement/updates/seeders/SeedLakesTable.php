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

        for ($i = 0; $i < 50; $i++) {
            Lake::create([
                'name' => $faker->word(),
                'depth' => $faker->randomFloat(2, 0, 100),
                'area' => $faker->randomFloat(2, 0, 500),
                'description' => $faker->words(16, true),
                'image' => null,
            ]);
        }
    }
}
