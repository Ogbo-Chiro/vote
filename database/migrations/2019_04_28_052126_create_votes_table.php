<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('Chairman');
            $table->string('Chairlady');
            $table->string('IT Rep');
            $table->string('Sports Rep');
            $table->string('Clubs Rep');
            $table->string('Academic Rep');
            $table->string('Secretary');
            $table->string('Honor Council');
            $table->string('Entertainment Rep');
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
        Schema::dropIfExists('votes');
    }
}
