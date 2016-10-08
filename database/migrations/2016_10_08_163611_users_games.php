<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('game_user', function (Blueprint $table) {
           $table->integer('user_id', false, true);
            $table->integer('game_id', false, true);

            $table->foreign('user_id')->references('id')->on('users')->onCreate('CASCADE')->onDelete('CASCADE');
            $table->foreign('game_id')->references('id')->on('games')->onCreate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('game_user');
    }
}
