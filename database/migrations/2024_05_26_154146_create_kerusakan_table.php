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
        Schema::create('kerusakan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rental')->constrained(table: 'rental', indexName: 'idfk_rental_5')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_product')->constrained(table: 'product', indexName: 'idfk_product_5')->onUpdate('cascade')->onDelete('cascade');
            $table->string('desc');
            $table->integer('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerusakan');
    }
};
