<?php namespace Banas\LakeManagement\Updates\Seeders;

use Seeder;
use Banas\LakeManagement\Models\LakeMetering;
use Banas\LakeManagement\Models\Lake;
use Carbon\Carbon;
use Faker\Factory as Faker;

/**
 * SeedLakeMeteringsTable
 */
class SeedLakeMeteringsTable extends Seeder
{
    /**
     * run the database seeds.
     */
    public function run()
    {

        $faker = Faker::create();
        $lakes = Lake::all();

        foreach ($lakes as $lake) {
            for ($i = 0; $i < 5; $i++) {
                LakeMetering::create([
                    'lake_id' => $lake->id,
                    'temperature' => $faker->randomFloat(2, 0, 40),
                    'measured_at' => Carbon::instance($faker->dateTimeBetween('-3 weeks', 'now')),
                    'description' => $faker->words(16, true),
                ]);
            }
        }

    }
}
