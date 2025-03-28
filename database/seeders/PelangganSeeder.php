<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $table->string('name');
        // $table->string('email');
        // $table->string('password');

        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $name = $faker->name;
            $email = $faker->unique()->safeEmail;
            DB::table('pelanggan')->insert([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt('password'),
                'foto' => $name . ".jpg"

            ]);

            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt('password'),
                'is_admin' => false
            ]);
        }
    }
}
