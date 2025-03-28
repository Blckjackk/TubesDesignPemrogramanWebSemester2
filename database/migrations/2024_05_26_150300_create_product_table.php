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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->integer('price');
            $table->integer('stok');
            $table->string('jenis');
            $table->foreignId('id_merek')->constrained(table: 'merek', indexName: 'idfk_merek_4')->onUpdate('cascade')->onDelete('cascade');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
