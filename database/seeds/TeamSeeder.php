<?php

use App\Models\Player;
use App\Models\Team;

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::truncate();
        Player::truncate();

        for ($i = 1; $i <= count(Team::TEAMS); $i++) {

            $team = Team::create([
                'name' => Team::TEAMS[$i],
            ]);

            $players = factory(Player::class, 15)->create([
                'team_id' => $team->id,
            ]);

        }

    }
}
