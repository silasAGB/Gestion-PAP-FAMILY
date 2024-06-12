<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFournisseurMatTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fournisseur_mat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fournisseur');
            $table->unsignedBigInteger('id_MP');
            $table->timestamps();

            $table->foreign('id_fournisseur')->references('id_fournisseur')->on('fournisseurs')->onDelete('cascade');
            $table->foreign('id_MP')->references('id_MP')->on('matiere_premieres')->onDelete('cascade');

            $table->unique(['id_fournisseur', 'id_MP']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournisseur_mat');
    }
}
