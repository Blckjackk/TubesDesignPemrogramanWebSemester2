<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $table->foreignId('id_rental')->constrained(table: 'rental', indexName: 'idfk_rental_4')->onUpdate('cascade')->onDelete('cascade');
        // $table->unsignedInteger('amount');
        // $table->string('payment_method');
        // $table->string('proof_of_payment');

        $rentalIds = DB::table('rental')->pluck('id')->toArray();
        $payment_method = ['QRIS', 'cash', 'transfer', 'hutang'];

        for ($i = 0; $i < 10; $i++) {

            DB::table('payment')->insert([
                'id_rental' => $rentalIds[array_rand($rentalIds)],
                'amount' => rand(250000, 500000),
                'payment_method' => $payment_method[array_rand($payment_method)],
                'proof_of_payment' => "Screenshoot " . $payment_method[array_rand($payment_method)] . ".jpg",
            ]);
        }
    }
}
