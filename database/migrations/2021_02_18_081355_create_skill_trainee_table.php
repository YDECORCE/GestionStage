<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillTraineeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_trainee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id')
            ->references('id')
            ->on('skills')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('trainee_id');
            $table->foreign('trainee_id')
            ->references('id')
            ->on('trainees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_trainee');
    }
}
