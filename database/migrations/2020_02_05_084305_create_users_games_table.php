<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idgames');
            $table->unsignedbigInteger('idusers');
            $table->string('estado')->nullable();

            $table->timestamps();

            $table->foreign('idgames')->references('id')->on('games')->onDelete('cascade');

            $table->foreign('idusers')->references('id')->on('users')->onDelete('cascade');

            $table->unique( array('idgames','idusers') );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_games');
    }
}
