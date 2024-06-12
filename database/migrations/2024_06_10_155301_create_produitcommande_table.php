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
        Schema::create('produitcommande', function (Blueprint $table) {
            $table->id('id_produit_commande');
            $table->unsignedBigInteger('id_produit');
            $table->unsignedBigInteger('id_commande');
            $table->integer('qte_produit_commande');
            $table->float('prix_unitaire');
            $table->float('montant_produit_commande');
            $table->timestamps();

            $table->foreign('id_produit')->references('id_produit')->on('produits')->onDelete('cascade');
            $table->foreign('id_commande')->references('id_commande')->on('commandes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produitcommande');
    }
};
