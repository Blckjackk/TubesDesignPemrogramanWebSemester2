<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = DB::table('users')->pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            DB::table('testimoni')->insert([
                'id_user' => $userIds[array_rand($userIds)],
                'content' => $faker->sentence,
            ]);
        }
    }
}
