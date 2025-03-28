<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SepatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definisikan beberapa merek tas untuk digunakan sebagai contoh nama merek
        $merek = ['Nike', 'Adidas', 'Puma', 'Reebok', 'Under Armour'];

        // Loop untuk membuat 10 data tas
        for ($i = 0; $i < 10; $i++) {
            DB::table('t_sepatu')->insert([
                'nama_sepatu' => $merek[array_rand($merek)],
                'harga_sepatu' => rand(100000, 300000),
                'deskripsi_sepatu' => Str::random(20),
                'id_merek' => rand(1, 5),
                'foto_sepatu' => 'sepatu-' . rand(1, 4) . '.jpg',
            ]);
        }
    }
}
