<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definisikan beberapa merek tas untuk digunakan sebagai contoh nama merek
        $merek = ['Eiger', 'Consina', 'Rei', 'Avtech', 'Deuter'];

        // Loop untuk membuat 10 data tas
        for ($i = 0; $i < 10; $i++) {
            DB::table('t_tas')->insert([
                'nama_tas' => $merek[array_rand($merek)],
                'harga_tas' => rand(100000, 300000),
                'deskripsi_tas' => Str::random(20),
                'id_merek' => rand(1, 5),
                'foto_tas' => 'tas-' . rand(1, 4) . '.jpg',
            ]);
        }
    }
}
