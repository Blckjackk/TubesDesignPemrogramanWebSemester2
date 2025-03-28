<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rental', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained(table: 'pelanggan', indexName: 'idfk_rental_1')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_product')->constrained(table: 'product', indexName: 'idfk_product_1')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('price');
            $table->timestamp('rental_date')->useCurrent();
            $table->date('return_date')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental');
    }
};
