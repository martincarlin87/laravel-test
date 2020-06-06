<?php

use App\Models\Game;

use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::truncate();

        factory(Game::class, 500)->create();
    }
}
