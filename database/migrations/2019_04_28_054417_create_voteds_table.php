<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voteds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('Chairman')->nullable();
            $table->string('Chairlady')->nullable();
            $table->string('ITRep')->nullable();
            $table->string('SportsRep')->nullable();
            $table->string('ClubsRep')->nullable();
            $table->string('AcademicRep')->nullable();
            $table->string('Secretary')->nullable();
            $table->string('HonorCouncil')->nullable();
            $table->string('EntertainmentRep')->nullable();
            $table->string('Treasurer')->nullable();
            $table->string('WellnessRep')->nullable();
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
        Schema::dropIfExists('voteds');
    }
}
