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
        Schema::create('tas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tas');
            $table->integer('harga_tas');
            $table->string('deskripsi_tas');
            // bakal ada nama atribut id_merek
            $table->foreignId('id_merek')
                // id dari table merek
                ->constrained(table: 'merek', indexName: 'idfk_tas_2')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('foto_tas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tas');
    }
};
