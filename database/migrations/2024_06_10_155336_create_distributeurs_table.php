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
        Schema::create('distributeurs', function (Blueprint $table) {
            $table->id('id_distributeur');
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
        Schema::dropIfExists('distributeurs');
    }
};
