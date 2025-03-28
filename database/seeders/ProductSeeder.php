<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    //  $table->string('name');
    //         $table->string('desc');
    //         $table->integer('price');
    //         $table->integer('stok');
    //         $table->string('jenis');
    //         $table->foreignId('id_merek')
    public function run(): void
    {
        $faker = Faker::create();

        // Daftar merek sepatu dan tas
        $shoeBrands = [
            'Nike', 'Adidas', 'Puma', 'Reebok', 'Converse', 'New Balance', 'ASICS',
            'Under Armour', 'Vans', 'Skechers', 'Fila', 'Brooks', 'Mizuno', 'Saucony',
            'Merrell', 'Columbia', 'Salomon', 'K-Swiss', 'Hoka One One', 'La Sportiva',
            'Timberland', 'Dr. Martens', 'Lacoste', 'Steve Madden', 'Clarks', 'ECCO',
            'Aldo', 'Hush Puppies', 'Kenneth Cole', 'Rockport', 'Crocs', 'Birkenstock',
            'TOMS', 'Sam Edelman', 'Johnston & Murphy', 'UGG', 'Sperry', 'Teva',
            'Bata', 'DC Shoes'
        ];

        $bagBrands = [
            'Hermes', 'Louis Vuitton', 'Gucci', 'Chanel', 'Prada', 'Dior', 'Fendi',
            'Givenchy', 'Balenciaga', 'Versace', 'Valentino', 'Burberry', 'Celine',
            'Bottega Veneta', 'Yves Saint Laurent', 'Alexander McQueen', 'Marc Jacobs',
            'Michael Kors', 'Kate Spade', 'Tory Burch', 'Coach', 'Longchamp',
            'Ralph Lauren', 'Tommy Hilfiger', 'Calvin Klein', 'Guess', 'DKNY',
            'Furla', 'Mulberry', 'Anya Hindmarch', 'MCM', 'Loewe', 'Stella McCartney',
            'Moschino', 'Salvatore Ferragamo', 'Proenza Schouler', 'Chloe',
            'Tods', 'Etro', 'Goyard', 'Lancel', 'Balmain'
        ];

        $brands = array_merge($shoeBrands, $bagBrands);

        // Ambil semua merek dari tabel merek
        $merekIds = DB::table('merek')->pluck('id');

        // Generate data produk
        for ($i = 0; $i < 10; $i++) {
            $brand = $brands[array_rand($brands)];
            $isShoe = in_array($brand, $shoeBrands);
            $category = $isShoe ? 'Sepatu' : 'Tas';

            DB::table('product')->insert([
                'name' => $brand,
                'desc' => $faker->sentence,
                'price' => rand(100000, 300000),
                'stok' => rand(1, 50),
                'jenis' => $category,
                'id_merek' => $merekIds->random(),
                'foto' => "default.jpg",
            ]);
        }
    }
}
