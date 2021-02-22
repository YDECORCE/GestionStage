<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineeshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traineeships', function (Blueprint $table) {
            $table->id();
            $table->date('dateofdemand');
            $table->date('relaunchdate')->nullable();
            $table->date('dateofinterview')->nullable();
            $table->string('status')->default('En attente');
            $table->unsignedBigInteger('trainee_id');
            $table->foreign('trainee_id')
                    ->references('id')
                    ->on('trainees')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('compagny_id');
            $table->foreign('compagny_id')
                    ->references('id')
                    ->on('compagnies')
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
        Schema::dropIfExists('traineeships');
    }
}
