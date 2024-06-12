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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('id_commande');
            $table->string('reference_commande')->unique();
            $table->date('date_commande');
            $table->float('montant');
            $table->string('statut');
            $table->string('adresse_livraison');
            $table->date('date_livraison');
            $table->unsignedBigInteger('id_client');
            $table->timestamps();

            $table->foreign('id_client')->references('id_client')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
