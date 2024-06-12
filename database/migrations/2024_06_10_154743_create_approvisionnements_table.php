<?php

use App\Models\fournisseurs;
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
        Schema::create('approvisionnements', function (Blueprint $table) {
            $table->id('id_approvisionnement');
            $table->date('date_approvisionnement');
            $table->string('reference_approvisionnement');
            $table->integer('qte_approvisionnement');
            $table->float('montant',8, 2);
            $table->unsignedBigInteger('id_fournisseur');
            $table->timestamps();

            $table->foreign('id_fournisseur')->references('id_fournisseur')->on('fournisseurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvisionnements');
    }
};
