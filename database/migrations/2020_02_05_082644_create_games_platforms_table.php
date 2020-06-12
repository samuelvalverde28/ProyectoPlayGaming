<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesPlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_platforms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idgames');
            $table->bigInteger('idplatforms');
            
            $table->timestamps();

            $table->foreign('idgames')->references('id')->on('games')->onDelete('cascade');

            $table->foreign('idplatforms')->references('id')->on('platforms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games_platforms');
    }
}
