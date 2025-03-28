<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merek = ['Eiger', 'Consina', 'Rei', 'Avtech', 'Deuter', 'North Face'];

        for ($i = 0; $i < 20; $i++) {
            DB::table('merek')->insert([
                'name' => $merek[array_rand($merek)],
            ]);
        }
    }
}
