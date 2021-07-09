<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpontaneousInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spontaneous_internships', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("Type_de_stage");
            $table->string("Département");
            $table->string("Period_start");
            $table->string("Period_end");
            $table->string("Poste")->nullable();
            $table->string("Nom_Prenom");
            $table->string("Adresse_mail");
            $table->string("Téléphone")->nullable();
            $table->string("Adresse")->nullable();
            $table->string("Ville");
            $table->string("Sexe");
            $table->string("Date_de_naissance")->nullable();
            $table->string("Niveau_étude");
            $table->string("Etablissement_de_formation")->nullable();
            $table->string("Années_expérience");
            $table->string("CV");
            $table->string("Lettre_motivation")->nullable();
            $table->text("Motivation")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spontaneousInternship');
    }
}
