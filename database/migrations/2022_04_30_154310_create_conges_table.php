<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_retour');
            $table->integer('annee');
            $table->string('interim');
            $table->string('statut');
            $table->integer('solde');
            $table->foreignId('matricule')
                  ->constrained('conges')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');  
            $table->foreignId('nom')
                  ->constrained('conges')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conges');
    }
}
