<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//  AO_E : ajouter offre emplois 
//  MO_E : modifier offre emplois
//  SO_E : supprimer offre emplois 

//  AO_S : ajouter offre stage
//  MO_S : modifier offre stage
//  SO_S : supprimer offre stage

//  TC_E : telecharger cv emploi
//  TL_E : telecharger lettre emploi
//  SC_E : supprimer candidature emploi

//  TC_S : telecharger cv stage
//  TL_S : telecharger lettre stage
//  SC_S : supprimer candidature stage

//  TC_CS : telecharger cv (candidature spontanée)
//  TL_CS : telecharger lettre (candidature spontanée)
//  SC_E_CS : supprimer candidature emploi (candidature spontanée)
//  SC_S_CS : supprimer candidature stage (candidature spontanée)

//  AU : add users
//  DU : delete users

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean("AO_E");
            $table->boolean("MO_E");
            $table->boolean("SO_E");

            $table->boolean("AO_S");
            $table->boolean("MO_S");
            $table->boolean("SO_S");

            $table->boolean("TC_E");
            $table->boolean("TL_E");
            $table->boolean("SC_E");

            $table->boolean("TC_S");
            $table->boolean("TL_S");
            $table->boolean("SC_S");

            $table->boolean("TC_CS");
            $table->boolean("TL_CS");
            $table->boolean("SC_E_CS");
            $table->boolean("SC_S_CS");

            $table->boolean("AU");
            $table->boolean("DU");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_permissions');
    }
}
