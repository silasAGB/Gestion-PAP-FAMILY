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
        Schema::create('matiereproduits', function (Blueprint $table) {
            $table->id('id_matiere_produit');
            $table->unsignedBigInteger('id_MP');
            $table->unsignedBigInteger('id_produit');
            $table->integer('qte');
            $table->timestamps();

            $table->foreign('id_MP')->references('id_MP')->on('matiere_premieres')->onDelete('cascade');
            $table->foreign('id_produit')->references('id_produit')->on('produits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matiereproduits');
    }
};
