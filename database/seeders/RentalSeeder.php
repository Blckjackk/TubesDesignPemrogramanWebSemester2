<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Ambil semua ID pengguna dari tabel users
        $userIds = DB::table('pelanggan')->pluck('id')->toArray();
        $productIds = DB::table('product')->pluck('id')->toArray();

        // Daftar status
        $status = ['masih dipinjam', 'dikembalikan', 'rusak'];

        // Generate data rental
        for ($i = 0; $i < 10; $i++) {

            $idUser = $userIds[array_rand($userIds)];
            $idProduct = $productIds[array_rand($productIds)];

            DB::table('rental')->insert([
                'id_user' => $idUser,
                'id_product' => $idProduct,
                'quantity' => rand(1, 10), // Menggunakan rand untuk mendapatkan nilai acak antara 1 hingga 10
                'price' => rand(100000, 350000), // Menggunakan rand untuk mendapatkan nilai acak antara 100000 hingga 350000
                'rental_date' => $faker->dateTimeBetween('-1 years', 'now'), // Tanggal sewa acak antara satu tahun lalu hingga sekarang
                'return_date' => $faker->dateTimeBetween('now', '+1 years'), // Tanggal kembali acak antara sekarang hingga satu tahun mendatang
                'status' => $status[array_rand($status)], // Ambil status secara acak dari array status
            ]);

            DB::table('rekap')->insert([
                'id_user' => $idUser,
                'id_product' => $idProduct,
            ]);
        }
    }
}
