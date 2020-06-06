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
            $table->id();
            $table->dateTime('tip_off')->nullable()->comment('Game Start Time');
            $table->unsignedInteger('home_team_id')->comment('Home Team ID');
            $table->unsignedInteger('away_team_id')->comment('Away Team ID');
            $table->unsignedTinyInteger('home_team_points')->default(0)->comment('Home Team Points');
            $table->unsignedTinyInteger('away_team_points')->default(0)->comment('Away Team Points');
            $table->timestamps();

            // Users mostly query game results by date and team name
            $table->index(['tip_off', 'home_team_id', 'away_team_id']);
            $table->index('home_team_id');
            $table->index('away_team_id');
        });
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
