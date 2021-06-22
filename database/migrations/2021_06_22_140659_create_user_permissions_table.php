<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->boolean("TC-CS");
            $table->boolean("TL-CS");
            $table->boolean("SC-E-CS");
            $table->boolean("SC-S-CS");
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
