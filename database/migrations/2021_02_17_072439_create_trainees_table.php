<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->string('adress');
            $table->string('postalcode');
            $table->string('city');
            $table->string('phonenumber');
            $table->string('email');
            $table->string('portfolio');
            $table->string('github');
            $table->string('cv');
            $table->boolean('mobility')->default(false);
            $table->string('mobilityzone');
            $table->unsignedBigInteger('promo_id');
            $table->foreign('promo_id')->references('id')->on('promos');
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
        Schema::dropIfExists('trainees');
    }
}
