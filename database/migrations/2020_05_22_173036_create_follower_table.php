<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follower', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('iduser');
            $table->unsignedbigInteger('idfollow');
            $table->timestamps();

            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idfollow')->references('id')->on('users')->onDelete('cascade');
            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follower');
    }
}
