<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_offers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("Offre");
            $table->string("Direction");
            $table->string("Département");
            $table->text("Description");
            $table->boolean("Activation");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internship_offers');
    }
}
