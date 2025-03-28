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
        Schema::create('sepatu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sepatu');
            $table->integer('harga_sepatu');
            $table->string('deskripsi_sepatu');
            // bakal ada nama atribut id_merek
            $table->foreignId('id_merek')
                // id dari table merek
                ->constrained(table: 'merek', indexName: 'idfk_sepatu_2')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('foto_sepatu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sepatu');
    }
};
