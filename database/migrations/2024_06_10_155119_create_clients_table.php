<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id_client');
            $table->string('nom_client');
            $table->string('contact_client');
            $table->string('adresse_client');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
