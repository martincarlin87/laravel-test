<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->comment('Player Name');
            $table->unsignedSmallInteger('height')->comment('Height (Inches)');
            $table->unsignedSmallInteger('weight')->comment('Weight (Pounds)');
            $table->unsignedInteger('position_id')->comment('Position ID');
            $table->unsignedInteger('team_id')->comment('Team ID');
            $table->timestamps();

            // The second most frequent query is players statistics by player name
            $table->index('name');
            $table->index('height');
            $table->index('weight');
            $table->index('position_id');
            $table->index('team_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
