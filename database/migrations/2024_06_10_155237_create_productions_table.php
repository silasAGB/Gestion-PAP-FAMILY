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
        Schema::create('productions', function (Blueprint $table) {
            $table->id('id_production');
            $table->date('date_prevue');
            $table->date('date_production');
            $table->integer('qte_prevue');
            $table->integer('qte_produite');
            $table->string('statut');
            $table->unsignedBigInteger('id_produit');
            $table->timestamps();

            $table->foreign('id_produit')->references('id_produit')->on('produits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
