<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigInteger('id')->unique()->primary();
            $table->string('name');
            $table->string('released')->nullable();
            $table->string('background_image')->nullable();
            $table->float('rating', 8,2)->nullable();
            $table->integer('rating_top')->nullable();
            $table->string('clip')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `games` MODIFY `rating` FLOAT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
