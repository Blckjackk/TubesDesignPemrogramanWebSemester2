<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MerekSeeder;
use Database\Seeders\RentalSeeder;
use Database\Seeders\ReportSeeder;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\KerusakanSeeder;
use Database\Seeders\PelangganSeeder;
use Database\Seeders\TestimoniSeeder;
use Database\Seeders\RentalItemSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PelangganSeeder::class,
            MerekSeeder::class,
            ProductSeeder::class,
            KerusakanSeeder::class,
            RentalSeeder::class,
            PaymentSeeder::class,
            ReportSeeder::class,
            TestimoniSeeder::class,
            // Tambahkan seeder-seeder lain yang Anda miliki
        ]);
    }
}
