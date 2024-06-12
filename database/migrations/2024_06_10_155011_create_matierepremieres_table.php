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
        Schema::create('matierepremieres', function (Blueprint $table) {
            $table->id('id_MP');
            $table->string('nom_MP');
            $table->float('prix_achat');
            $table->integer('qte_stock');
            $table->integer('seuil_stock');
            $table->integer('unite');
            $table->unsignedBigInteger('id_categorie');
            $table->timestamps();

            $table->foreign('id_categorie')->references('id_categorie')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matierepremieres');
    }
};
